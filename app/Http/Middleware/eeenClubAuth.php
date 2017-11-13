<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class eeenClubAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, string $redirect = 'true')
    {
        // If user has valid cookies or a valid session
        $cUsername = $request->cookie('user');
        $cToken = $request->cookie('token');
        if ($this->check($cUsername, $cToken))
        {
            $acc = App\Account::where('loginUsername', $cUsername)->first();
            $request->attributes->add(['passenger' => $acc->passenger()->first(), 'account' => $acc]);
            return $next($request);
        }


        $sUsername = $request->session()->get('user');
        $sToken = $request->session()->get('token');
        if ($this->check($sUsername, $sToken))
        {
            $acc = App\Account::where('loginUsername', $sUsername)->first();
            $request->attributes->add(['passenger' => $acc->passenger()->first(), 'account' => $acc]);
            return $next($request);
        }


        if ($redirect == 'true')
            return redirect(route('eeenclub.loginpage'))->with('referrer', $request->url());
        else
        {
            $request->attributes->add(['passenger' => null]);
            return $next($request);
        }
    }

    private function check($username, $token)
    {
        if ($username != null && $token != null)
        {
            if (Cache::get('login/' . $username) === $token)
                return true;
        }
        return false;
    }

    public function getPassenger()
    {
        return App\Passenger::where('id', '')->first();
    }

    public function getAccount()
    {
        return App\Account::where('passenger', '') ->first();
    }
}
