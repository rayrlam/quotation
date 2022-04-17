<?php
namespace App\Helpers;

use App\Models\Age;
use App\Models\Abicode;
use App\Models\Postcode;

class QuoteHelper 
{
    const BASE_PREMIUM = 500;

    static private $fakeRegNo = [
        22529902 =>"PJ63 LXR",
        46545255 =>"AB64 DEC",
        52123803 =>"AB65 QDA",
    ];

    static private $fake_api_link = 'https://fakeapi.com/api/v1/regno/';

    static public function getQuote($request)
    {
        $rf_age = self::getRf('age', (int) $request->age);
        $rf_postcode = self::getRf('postcode', $request->postcode);
        $rf_abicode = self::getRf('abicode', $request->regNo);

        return QuoteHelper::BASE_PREMIUM * $rf_age * $rf_postcode * $rf_abicode;
    }

    static public function getFakeAbicode(string $regNo): int 
    {
        // $api = self::$fake_api_link . trim($regNo);
        // $json = json_decode(file_get_contents($api), true);
        // .........
        // return $abi_code;

        foreach(self::$fakeRegNo as $k=>$v)
        {
            if($v == $regNo)
            {
                return $k;
            }
        }
        return 0;
    }

    private function getRf($type, $value): float
    {
        switch($type)
        {
            case "age":
                $age = Age::where('age', $value)->first();
                if($age)
                {
                    return $age->rating_factor;
                }
                break;
            
            case "postcode":
                $postcode = Postcode::where('postcode_area', explode(" ", $value)[0])->first();
                if($postcode)
                {
                    return $postcode->rating_factor;
                }
                break;
            
            case "abicode":
                if($abi_code = self::getFakeAbicode($value))
                {
                    $abi = Abicode::where('abi_code', $abi_code)->first();
                    if($abi)
                    {
                        return $abi->rating_factor;
                    }
                }
                break;
        }
        return 1.0;
    }
}