<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class airportSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('airports')->insert([
            [
               'icao' => 'KABI',
               'name' => 'Abilene Regional',
               'city' => 'Abilene',
               'state' => 'TX',
               'timezone' => 'America/Chicago',
               'latitude' => 32.4113,
               'longitude' => -99.6819,
               'activity' => 1
            ],
            [
                'icao' => 'KABQ',
                'name' => 'Albuquerque International',
                'city' => 'Albuquerque',
                'state' => 'NM',
                'timezone' => 'America/Denver',
                'latitude' => 35.0401,
                'longitude' => -106.6090,
                'activity' => 2
            ],
            [
                'icao' => 'KAUS',
                'name' => 'Austin Bergstrom International',
                'city' => 'Austin',
                'state' => 'TX',
                'timezone' => 'America/Chicago',
                'latitude' => 30.1944,
                'longitude' => -97.6698,
                'activity' => 2
            ],
            [
                'icao' => 'PAFA',
                'name' => 'Fairbanks International',
                'city' => 'Fairbanks',
                'state' => 'AK',
                'timezone' => 'America/Anchorage',
                'latitude' => 64.8151,
                'longitude' => -147.8560,
                'activity' => 1
            ],
            [
                'icao' => 'PANC',
                'name' => 'Ted Stevens Anchorage International',
                'city' => 'Anchorage',
                'state' => 'AK',
                'timezone' => 'America/Anchorage',
                'latitude' => 61.1744,
                'longitude' => -149.9960,
                'activity' => 3
            ],
            [
                'icao' => 'PADQ',
                'name' => 'Kodiak Airport',
                'city' => 'Kodiak',
                'state' => 'AK',
                'timezone' => 'America/Anchorage',
                'latitude' => 57.75,
                'longitude' => -152.4940,
                'activity' => 1
            ],
            [
                'icao' => 'KATL',
                'name' => 'Hartsfield Jackson Atlanta International',
                'city' => 'Atlanta',
                'state' => 'GA',
                'timezone' => 'America/New_York',
                'latitude' => 33.6366,
                'longitude' => -84.4281,
                'activity' => 3
            ],
            [
                'icao' => 'KBIS',
                'name' => 'Bismarck Municipal',
                'city' => 'Bismarck',
                'state' => 'ND',
                'timezone' => 'America/Chicago',
                'latitude' => 46.7727,
                'longitude' => -100.7460,
                'activity' => 1
            ],
            [
                'icao' => 'KBDL',
                'name' => 'Bradley International',
                'city' => 'Hartford',
                'state' => 'CT',
                'timezone' => 'America/New_York',
                'latitude' => 41.9388,
                'longitude' => -72.6831,
                'activity' => 2
            ],
            [
                'icao' => 'KBIL',
                'name' => 'Billings Logan International',
                'city' => 'Billings',
                'state' => 'MT',
                'timezone' => 'America/Denver',
                'latitude' => 45.8077,
                'longitude' => -108.5429,
                'activity' => 2
            ],
            [
                'icao' => 'KBOI',
                'name' => 'Boise Air Terminal',
                'city' => 'Boise',
                'state' => 'ID',
                'timezone' => 'America/Denver',
                'latitude' => 43.5643,
                'longitude' => -116.2229,
                'activity' => 1
            ],
            [
                'icao' => 'KBOS',
                'name' => 'Boston Logan International',
                'city' => 'Boston',
                'state' => 'MA',
                'timezone' => 'America/New_York',
                'latitude' => 42.3642,
                'longitude' => -71.0052,
                'activity' => 3
            ],
            [
                'icao' => 'KBHM',
                'name' => 'Birmingham-Shuttlesworth International',
                'city' => 'Birmingham',
                'state' => 'AL',
                'timezone' => 'America/Chicago',
                'latitude' => 33.5629,
                'longitude' => -86.7535,
                'activity' => 1
            ],
            [
                'icao' => 'KBNA',
                'name' => 'Nashville International',
                'city' => 'Nashville',
                'state' => 'TN',
                'timezone' => 'America/Chicago',
                'latitude' => 36.1245,
                'longitude' => -86.6781,
                'activity' => 2
            ],
            [
                'icao' => 'KBRO',
                'name' => 'Brownsville South Padre Island International',
                'city' => 'Brownsville',
                'state' => 'TX',
                'timezone' => 'America/Chicago',
                'latitude' => 25.9067,
                'longitude' => -97.4259,
                'activity' => 1
            ],
            [
                'icao' => 'KBTM',
                'name' => 'Bert Mooney Airport',
                'city' => 'Butte',
                'state' => 'MT',
                'timezone' => 'America/Denver',
                'latitude' => 45.9547,
                'longitude' => -112.4970,
                'activity' => 1
            ],
            [
                'icao' => 'KBTV',
                'name' => 'Burlington International',
                'city' => 'Burlington',
                'state' => 'VT',
                'timezone' => 'America/New_York',
                'latitude' => 44.4719,
                'longitude' => -73.1532,
                'activity' => 1
            ],
            [
                'icao' => 'KBUF',
                'name' => 'Buffalo Niagra International',
                'city' => 'Buffalo',
                'state' => 'NY',
                'timezone' => 'America/New_York',
                'latitude' => 42.9404,
                'longitude' => -78.7322,
                'activity' => 2
            ],
            [
                'icao' => 'KCHS',
                'name' => 'Charleston International',
                'city' => 'Charleston',
                'state' => 'SC',
                'timezone' => 'America/New_York',
                'latitude' => 32.8986,
                'longitude' => -80.0404,
                'activity' => 1
            ],
            [
                'icao' => 'KCLE',
                'name' => 'Cleveland Hopkins International',
                'city' => 'Cleveland',
                'state' => 'OH',
                'timezone' => 'America/New_York',
                'latitude' => 41.4117,
                'longitude' => -81.8498,
                'activity' => 2
            ],
            [
                'icao' => 'KCLT',
                'name' => 'Charlotte Douglas International',
                'city' => 'Charlotte',
                'state' => 'NC',
                'timezone' => 'America/New_York',
                'latitude' => 35.2140,
                'longitude' => -80.9430,
                'activity' => 4
            ],
            [
                'icao' => 'KCMH',
                'name' => 'Port Columbus International',
                'city' => 'Columbus',
                'state' => 'OH',
                'timezone' => 'America/New_York',
                'latitude' => 39.9980,
                'longitude' => -82.8918,
                'activity' => 1
            ],
            [
                'icao' => 'KCOS',
                'name' => 'City of Colorado Springs Municipal',
                'city' => 'Colorado Springs',
                'state' => 'CO',
                'timezone' => 'America/Denver',
                'latitude' => 38.8058,
                'longitude' => -104.7009,
                'activity' => 1
            ],
            [
                'icao' => 'KCVG',
                'name' => 'Cincinatti/Northern Kentucky International',
                'city' => 'Cincinatti',
                'state' => 'OH',
                'timezone' => 'America/New_York',
                'latitude' => 39.0488,
                'longitude' => -84.6678,
                'activity' => 1
            ],
            [
                'icao' => 'KCYS',
                'name' => 'Jerry Olsen Field',
                'city' => 'Cheyenne',
                'state' => 'WY',
                'timezone' => 'America/Denver',
                'latitude' => 41.1557,
                'longitude' => -104.8119,
                'activity' => 1
            ],
            [
                'icao' => 'KDAL',
                'name' => 'Dallas Love Field',
                'city' => 'Dallas/Ft. Worth',
                'state' => 'TX',
                'timezone' => 'America/Chicago',
                'latitude' => 32.8470,
                'longitude' => -96.8517,
                'activity' => 1
            ],
            [
                'icao' => 'KDEN',
                'name' => 'Denver International',
                'city' => 'Denver',
                'state' => 'CO',
                'timezone' => 'America/Denver',
                'latitude' => 39.8616,
                'longitude' => -104.6729,
                'activity' => 3
            ],
            [
                'icao' => 'KDFW',
                'name' => 'Dallas/Ft. Worth International',
                'city' => 'Dallas/Ft. Worth',
                'state' => 'TX',
                'timezone' => 'America/Chicago',
                'latitude' => 32.8968,
                'longitude' => -97.0380,
                'activity' => 3
            ],
            [
                'icao' => 'KDLH',
                'name' => 'Duluth International',
                'city' => 'Duluth',
                'state' => 'MN',
                'timezone' => 'America/Chicago',
                'latitude' => 46.8420,
                'longitude' => -92.1936,
                'activity' => 1
            ],
            [
                'icao' => 'KDSM',
                'name' => 'Des Moines International',
                'city' => 'Des Moines',
                'state' => 'IA',
                'timezone' => 'America/Chicago',
                'latitude' => 41.5340,
                'longitude' => -93.6631,
                'activity' => 2
            ],
            [
                'icao' => 'KDTW',
                'name' => 'Detroit Metropolitan Wayne County Airport',
                'city' => 'Detroit',
                'state' => 'MI',
                'timezone' => 'America/New_York',
                'latitude' => 42.2123,
                'longitude' => -83.3534,
                'activity' => 2
            ],
            [
                'icao' => 'KELP',
                'name' => 'El Paso International',
                'city' => 'El Paso',
                'state' => 'TX',
                'timezone' => 'America/Denver',
                'latitude' => 31.8071,
                'longitude' => -106.3779,
                'activity' => 2
            ],
            [
                'icao' => 'KFAR',
                'name' => 'Hector International',
                'city' => 'Fargo',
                'state' => 'ND',
                'timezone' => 'America/Chicago',
                'latitude' => 46.9207,
                'longitude' => -96.8158,
                'activity' => 2
            ],
            [
                'icao' => 'KFSD',
                'name' => 'Joe Foss Field Airport',
                'city' => 'Sioux Falls',
                'state' => 'SD',
                'timezone' => 'America/Chicago',
                'latitude' => 43.5820,
                'longitude' => -96.7418,
                'activity' => 1
            ],
            [
                'icao' => 'PFYU',
                'name' => 'Fort Yukon Airport',
                'city' => 'Fort Yukon',
                'state' => 'AK',
                'timezone' => 'America/Anchorage',
                'latitude' => 66.571,
                'longitude' => -145.25,
                'activity' => 1
            ],
            [
                'icao' => 'KGEG',
                'name' => 'Spokane International',
                'city' => 'Spokane',
                'state' => 'WA',
                'timezone' => 'America/Los_Angeles',
                'latitude' => 47.6198,
                'longitude' => -117.5339,
                'activity' => 1
            ],
            [
                'icao' => 'PHNL',
                'name' => 'Honolulu International',
                'city' => 'Honolulu',
                'state' => 'HI',
                'timezone' => 'Pacific/Honolulu',
                'latitude' => 21.3187,
                'longitude' => -157.9219,
                'activity' => 3
            ],
            [
                'icao' => 'POGG',
                'name' => 'Kahului Airport',
                'city' => 'Kahului',
                'state' => 'HI',
                'timezone' => 'Pacific/Honolulu',
                'latitude' => 20.8985,
                'longitude' => -156.4299,
                'activity' => 1
            ],
            [
                'icao' => 'PITO',
                'name' => 'Hilo International',
                'city' => 'Hilo',
                'state' => 'HI',
                'timezone' => 'Pacific/Honolulu',
                'latitude' => 19.7213,
                'longitude' => -155.0480,
                'activity' => 2
            ],
            [
                'icao' => 'KIAD',
                'name' => 'Washington Dulles International',
                'city' => 'Washington D.C.',
                'state' => 'VA',
                'timezone' => 'America/New_York',
                'latitude' => 38.9444,
                'longitude' => -77.4558,
                'activity' => 3
            ],
            [
                'icao' => 'KIAH',
                'name' => 'George Bush Intercontinental',
                'city' => 'Houston',
                'state' => 'TX',
                'timezone' => 'America/Chicago',
                'latitude' => 29.9843,
                'longitude' => -95.3414,
                'activity' => 4
            ],
            [
                'icao' => 'KICT',
                'name' => 'Wichita Mid-Continent Airport',
                'city' => 'Wichita',
                'state' => 'KS',
                'timezone' => 'America/Chicago',
                'latitude' => 37.6498,
                'longitude' => -97.4330,
                'activity' => 1
            ],
            [
                'icao' => 'KIND',
                'name' => 'Indianapolis International',
                'city' => 'Indianapolis',
                'state' => 'IN',
                'timezone' => 'America/New_York',
                'latitude' => 39.7173,
                'longitude' => -86.2944,
                'activity' => 2
            ],
            [
                'icao' => 'KJAC',
                'name' => 'Jackson Hole Airport',
                'city' => 'Jackson',
                'state' => 'WY',
                'timezone' => 'America/Denver',
                'latitude' => 43.6072,
                'longitude' => -110.7379,
                'activity' => 2
            ],
            [
                'icao' => 'TJSJ',
                'name' => 'Luis Munoz Marin International',
                'city' => 'San Juan',
                'state' => 'Puerto Rico',
                'timezone' => 'America/Puerto_Rico',
                'latitude' => 18.4393,
                'longitude' => -66.0018,
                'activity' => 2
            ],
            [
                'icao' => 'KLAN',
                'name' => 'Capital City Airport',
                'city' => 'Lansing',
                'state' => 'MI',
                'timezone' => 'America/New_York',
                'latitude' => 42.7787,
                'longitude' => -84.5874,
                'activity' => 1
            ],
            [
                'icao' => 'KLAS',
                'name' => 'McCarran International',
                'city' => 'Las Vegas',
                'state' => 'NV',
                'timezone' => 'America/Denver',
                'latitude' => 36.0801,
                'longitude' => -115.1520,
                'activity' => 3
            ],
            [
                'icao' => 'KLAX',
                'name' => 'Los Angeles International',
                'city' => 'Los Angeles',
                'state' => 'CA',
                'timezone' => 'America/Los_Angeles',
                'latitude' => 33.9425,
                'longitude' => -118.4079,
                'activity' => 3
            ],
            [
                'icao' => 'KLBB',
                'name' => 'Lubbock Preston Smith International',
                'city' => 'Lubbock',
                'state' => 'TX',
                'timezone' => 'America/Chicago',
                'latitude' => 33.6636,
                'longitude' => -101.8229,
                'activity' => 1
            ],
            [
                'icao' => 'PLIH',
                'name' => 'Lihue Airport',
                'city' => 'Kauai',
                'state' => 'HI',
                'timezone' => 'Pacific/Honolulu',
                'latitude' => 21.9759,
                'longitude' => -159.3390,
                'activity' => 1
            ],
            [
                'icao' => 'KLIT',
                'name' => 'Bill and Hillary Clinton International',
                'city' => 'Little Rock',
                'state' => 'AR',
                'timezone' => 'America/Chicago',
                'latitude' => 34.7294,
                'longitude' => -92.2242,
                'activity' => 1
            ],
            [
                'icao' => 'KMCI',
                'name' => 'Kansas City International',
                'city' => 'Kansas City',
                'state' => 'MO',
                'timezone' => 'America/Chicago',
                'latitude' => 39.2976,
                'longitude' => -94.7138,
                'activity' => 2
            ],
            [
                'icao' => 'KMDW',
                'name' => 'Chicago Midway International',
                'city' => 'Chicago',
                'state' => 'IL',
                'timezone' => 'America/Chicago',
                'latitude' => 41.7859,
                'longitude' => -87.7524,
                'activity' => 3
            ],
            [
                'icao' => 'KMFR',
                'name' => 'Rogue Valley Medford International',
                'city' => 'Medford',
                'state' => 'OR',
                'timezone' => 'America/Los_Angeles',
                'latitude' => 42.3741,
                'longitude' => -122.8730,
                'activity' => 1
            ],
            [
                'icao' => 'KMIA',
                'name' => 'Miami International',
                'city' => 'Miami',
                'state' => 'FL',
                'timezone' => 'America/New_York',
                'latitude' => 25.7931,
                'longitude' => -80.2906,
                'activity' => 3
            ],
            [
                'icao' => 'KMSO',
                'name' => 'Missoula International',
                'city' => 'Missoula',
                'state' => 'MT',
                'timezone' => 'America/Denver',
                'latitude' => 46.9163,
                'longitude' => -114.0910,
                'activity' => 1
            ],
            [
                'icao' => 'KMSY',
                'name' => 'Louis Amstrong New Orleans International',
                'city' => 'New Orleans',
                'state' => 'LA',
                'timezone' => 'America/Chicago',
                'latitude' => 29.9934,
                'longitude' => -90.2580,
                'activity' => 2
            ],
            [
                'icao' => 'KMSP',
                'name' => 'Minneapolis/St. Paul International',
                'city' => 'Minneapolis/St. Paul',
                'state' => 'MN',
                'timezone' => 'America/Chicago',
                'latitude' => 44.8819,
                'longitude' => -93.2218,
                'activity' => 4
            ],
            [
                'icao' => 'KMWC',
                'name' => 'Lawrence J Timmerman Airport',
                'city' => 'Milwaukee',
                'state' => 'WI',
                'timezone' => 'America/Chicago',
                'latitude' => 43.1104,
                'longitude' => -88.0344,
                'activity' => 1
            ],
            [
                'icao' => 'KOKC',
                'name' => 'Will Rodgers World Airport',
                'city' => 'Oklahoma City',
                'state' => 'OK',
                'timezone' => 'America/Chicago',
                'latitude' => 35.3931,
                'longitude' => -97.6007,
                'activity' => 2
            ],
            [
                'icao' => 'KOMA',
                'name' => 'Eppley Airfield',
                'city' => 'Omaha',
                'state' => 'NE',
                'timezone' => 'America/Chicago',
                'latitude' => 41.3031,
                'longitude' => -95.8940,
                'activity' => 2
            ],
            [
                'icao' => 'KORF',
                'name' => 'Norfolk International',
                'city' => 'Norfolk',
                'state' => 'VA',
                'timezone' => 'America/New_York',
                'latitude' => 36.8945,
                'longitude' => -76.2012,
                'activity' => 1
            ],
            [
                'icao' => 'KPDX',
                'name' => 'Portland International',
                'city' => 'Portland',
                'state' => 'OR',
                'timezone' => 'America/Los_Angeles',
                'latitude' => 45.5886,
                'longitude' => -122.5979,
                'activity' => 2
            ],
            [
                'icao' => 'KPHL',
                'name' => 'Philadelphia International',
                'city' => 'Philadelphia',
                'state' => 'PA',
                'timezone' => 'America/New_York',
                'latitude' => 39.8718,
                'longitude' => -75.2410,
                'activity' => 3
            ],
            [
                'icao' => 'KPIR',
                'name' => 'Pierre Regional',
                'city' => 'Pierre',
                'state' => 'SD',
                'timezone' => 'America/Chicago',
                'latitude' => 44.3827,
                'longitude' => -100.2860,
                'activity' => 1
            ],
            [
                'icao' => 'KPIT',
                'name' => 'Pittsburgh International',
                'city' => 'Pittsburgh',
                'state' => 'PA',
                'timezone' => 'America/New_York',
                'latitude' => 40.4915,
                'longitude' => -80.2329,
                'activity' => 2
            ],
            [
                'icao' => 'KPHX',
                'name' => 'Phoenix Sky Harbor International',
                'city' => 'Phoenix',
                'state' => 'AZ',
                'timezone' => 'America/Phoenix',
                'latitude' => 33.4342,
                'longitude' => -112.0120,
                'activity' => 3
            ],
            [
                'icao' => 'KPWM',
                'name' => 'Portland International Jetport',
                'city' => 'Portland',
                'state' => 'ME',
                'timezone' => 'America/New_York',
                'latitude' => 43.6461,
                'longitude' => -70.3093,
                'activity' => 1
            ],
            [
                'icao' => 'KOAK',
                'name' => 'Metropolitan Oakland International',
                'city' => 'Oakland',
                'state' => 'CA',
                'timezone' => 'America/Los_Angeles',
                'latitude' => 37.7212,
                'longitude' => -122.2210,
                'activity' => 2
            ],
            [
                'icao' => 'KRAP',
                'name' => 'Rapid City Regional',
                'city' => 'Rapid City',
                'state' => 'SD',
                'timezone' => 'America/Denver',
                'latitude' => 44.0452,
                'longitude' => -103.0569,
                'activity' => 1
            ],
            [
                'icao' => 'KRDU',
                'name' => 'Raleigh Durham International',
                'city' => 'Raleigh',
                'state' => 'NC',
                'timezone' => 'America/New_York',
                'latitude' => 35.8776,
                'longitude' => -78.7874,
                'activity' => 1
            ],
            [
                'icao' => 'KRIC',
                'name' => 'Richmond International',
                'city' => 'Richmond',
                'state' => 'VA',
                'timezone' => 'America/New_York',
                'latitude' => 37.5051,
                'longitude' => -77.3197,
                'activity' => 2
            ],
            [
                'icao' => 'KRNO',
                'name' => 'Reno Tahoe International',
                'city' => 'Reno',
                'state' => 'NV',
                'timezone' => 'America/Los_Angeles',
                'latitude' => 39.4990,
                'longitude' => -119.7679,
                'activity' => 1
            ],
            [
                'icao' => 'KSAF',
                'name' => 'Santa Fe Municipal',
                'city' => 'Santa Fe',
                'state' => 'NM',
                'timezone' => 'America/Denver',
                'latitude' => 35.6170,
                'longitude' => -106.0889,
                'activity' => 1
            ],
            [
                'icao' => 'KSAN',
                'name' => 'San Diego International',
                'city' => 'San Diego',
                'state' => 'CA',
                'timezone' => 'America/Los_Angeles',
                'latitude' => 32.7336,
                'longitude' => -117.1900,
                'activity' => 2
            ],
            [
                'icao' => 'KSAT',
                'name' => 'San Antonio International',
                'city' => 'San Antonio',
                'state' => 'TX',
                'timezone' => 'America/Chicago',
                'latitude' => 29.5337,
                'longitude' => -98.4698,
                'activity' => 3
            ],
            [
                'icao' => 'KSAV',
                'name' => 'Savannah Hilton Head International',
                'city' => 'Savannah',
                'state' => 'GA',
                'timezone' => 'America/New_York',
                'latitude' => 32.1276,
                'longitude' => -81.2021,
                'activity' => 1
            ],
            [
                'icao' => 'KSDF',
                'name' => 'Louisville International Standiford Field',
                'city' => 'Louisville',
                'state' => 'KT',
                'timezone' => 'America/New_York',
                'latitude' => 38.1744,
                'longitude' => -85.736,
                'activity' => 2
            ],
            [
                'icao' => 'KSEA',
                'name' => 'Seattle International',
                'city' => 'Seattle',
                'state' => 'WA',
                'timezone' => 'America/Los_Angeles',
                'latitude' => 47.4490,
                'longitude' => -122.3089,
                'activity' => 3
            ],
            [
                'icao' => 'KSFO',
                'name' => 'San Francisco International',
                'city' => 'San Francisco',
                'state' => 'CA',
                'timezone' => 'America/Los_Angeles',
                'latitude' => 37.6189,
                'longitude' => -122.375,
                'activity' => 2
            ],
            [
                'icao' => 'KSLC',
                'name' => 'Salt Lake City International',
                'city' => 'Salt Lake City',
                'state' => 'UT',
                'timezone' => 'America/Denver',
                'latitude' => 40.7883,
                'longitude' => -111.9779,
                'activity' => 4
            ],
            [
                'icao' => 'KSMF',
                'name' => 'Sacramento International',
                'city' => 'Sacramento',
                'state' => 'CA',
                'timezone' => 'America/Los_Angeles',
                'latitude' => 38.6954,
                'longitude' => -121.5910,
                'activity' => 2
            ],
            [
                'icao' => 'KSTL',
                'name' => 'Lambert St. Louis International',
                'city' => 'St. Louis',
                'state' => 'MO',
                'timezone' => 'America/Chicago',
                'latitude' => 38.7486,
                'longitude' => -90.3700,
                'activity' => 2
            ],
            [
                'icao' => 'KSWF',
                'name' => 'Stewart International',
                'city' => 'New York',
                'state' => 'NY',
                'timezone' => 'America/New_York',
                'latitude' => 41.5041,
                'longitude' => -74.1047,
                'activity' => 4
            ],
            [
                'icao' => 'KSYR',
                'name' => 'Syracuse Hancock International',
                'city' => 'Syracuse',
                'state' => 'NY',
                'timezone' => 'America/New_York',
                'latitude' => 43.1111,
                'longitude' => -76.1063,
                'activity' => 1
            ],
            [
                'icao' => 'KTLH',
                'name' => 'Tallahassee Regional',
                'city' => 'Tallahassee',
                'state' => 'FL',
                'timezone' => 'America/New_York',
                'latitude' => 30.3964,
                'longitude' => -84.3503,
                'activity' => 1
            ],
            [
                'icao' => 'KTPA',
                'name' => 'Tampa International',
                'city' => 'Tampa',
                'state' => 'FL',
                'timezone' => 'America/New_York',
                'latitude' => 27.9755,
                'longitude' => -82.5332,
                'activity' => 2
            ],
            [
                'icao' => 'KTUS',
                'name' => 'Tucson International',
                'city' => 'Tucson',
                'state' => 'AZ',
                'timezone' => 'America/Phoenix',
                'latitude' => 32.1161,
                'longitude' => -110.9410,
                'activity' => 1
            ],
            [
                'icao' => 'KTWF',
                'name' => 'Joslin Field Magic Valley Regional',
                'city' => 'Twin Falls',
                'state' => 'ID',
                'timezone' => 'America/Denver',
                'latitude' => 42.4818,
                'longitude' => -114.4879,
                'activity' => 1
            ]
        ]);
    }
}
