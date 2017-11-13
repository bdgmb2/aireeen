<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon;
use Illuminate\Support\Facades\Hash;

use App;

class eeenClub extends Controller
{
    public function accountPage(Request $request)
    {
        return view('eeenclub.eeenclub', [
            'passenger' => $request->get('passenger'),
            'account' => $request->get('account')
        ]);
    }

    public function login(Request $request)
    {
        $username = strtolower($request->input('user'));
        $password = $request->input('pass');

        $findUser = App\Account::where('loginUsername', $username)->first();
        if ($findUser != null)
        {
            // Check hash
            if (Hash::check($password, $findUser->loginPassword))
            {

                // Username and password match, log in either through session or cookie
                $tokenOut = str_random(32);
                if ($request->input('referrer') != null && $request->input('referrer') != '')
                    $redir = redirect($request->input('referrer'));
                else
                    $redir = redirect()->back();

                if ($request->input('remember'))
                    return $redir->cookie('user', $username, 120)->cookie('token', $tokenOut, 120);
                else
                {
                    Cache::put('login/' . $username, $tokenOut, 120);
                    $request->session()->put('user', $username);
                    $request->session()->put('token', $tokenOut);
                    return $redir;
                }
            }
        }
        return redirect()->route('eeenclub.loginpage')->withErrors(collect('Your username and/or password is incorrect. Please try again.'));
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return back();
    }

    public function register(Request $request)
    {
        $request->flash();

        $validator = Validator::make($request->all(), [
            'surname' => Rule::in(array_prepend(App\Passenger::$surnameValues, '')),
            'suffix' => Rule::in(array_prepend(App\Passenger::$suffixValues, '')),
            'firstname' => 'required|alpha_dash',
            'lastname' => 'required|alpha_dash',
            'email' => 'required|confirmed',
            'password' => 'required|confirmed',
            'gender' => Rule::in(['m', 'f']),
            'datebirth' => 'required|date'
        ], [
            'surname.in' => 'The surname must be one of the fields in the dropdown.',
            'suffix.in' => 'The suffix must be one of the fields in the dropdown.',
            'firstname.required' => 'Your first name is required.',
            'firstname.alpha_dash' => 'Your first name is not valid.',
            'lastname.required' => 'Your last name is required.',
            'lastname.alpha_dash' => 'Your last name is not valid.',
            'email.required' => 'Your email address is required for us to send you flight confirmations and important information.',
            'email.confirmed' => 'The email fields must match.',
            'password.required' => 'A strong password is required.',
            'password.confirmed' => 'The password fields must match.',
            'gender.in' => 'Your gender must be \'Male\' or \'Female\'.',
            'datebirth.required' => 'Your birthdate is required.',
            'datebirth.date' => 'Your date of birth must be formatted as a date. Example: MM/DD/YYYY'
        ]);

        if ($validator->errors()->count() > 0)
            return redirect()->route('eeenclub.registerpage')->withErrors($validator->errors());

        // Set Up New Passenger
        $passengerAdd = new App\Passenger([
            'firstName' => $request->input('firstname'),
            'lastName' => $request->input('lastname'),
            'suffix' => $request->input('suffix') != '' ? $request->input('suffix') : null,
            'title' => $request->input('surname') != '' ? $request->input('surname') : null,
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
            'phoneCountry' => $request->input('countrycode'),
            'phone' => $request->input('phone'),
            'dateOfBirth' => Carbon\Carbon::parse($request->input('datebirth'))
        ]);
        $passengerAdd->save();

        $accountAdd = new App\Account();
        $accountAdd->passenger = $passengerAdd->id;
        $accountAdd->loginUsername = substr(strtolower($passengerAdd->firstName), 0, rand(1, count($passengerAdd->firstName))) . rand(10, 99) . substr(strtolower($passengerAdd->lastName), 0, rand(1, count($passengerAdd->lastName))) . str_random(6);
        $accountAdd->loginPassword = Hash::make($request->input('password'));
        $accountAdd->save();

        // Send verification email

        return view('eeenclub.registersuccess', [ 'id' => $accountAdd->loginUsername, 'email' => $passengerAdd->email ]);
    }
}
