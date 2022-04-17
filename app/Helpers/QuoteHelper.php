<?php
namespace App\Helpers;

use App\Models\Age;
use App\Models\Abicode;
use App\Models\Postcode;

class QuoteHelper 
{
    const BASE_PREMIUM = 500;

    static public $fakeRegNo = [
        22529902 =>"PJ63 LXR",
        46545255 =>"AB64 DEC",
        52123803 =>"AB65 QDA",
    ];

    static public $fakeAge = [
        ["id"=>10,"age"=>17,"rating_factor"=>1.5],
        ["id"=>11,"age"=>18,"rating_factor"=>1.4],
        ["id"=>12,"age"=>19,"rating_factor"=>1.3],
        ["id"=>13,"age"=>20,"rating_factor"=>1.2],
        ["id"=>14,"age"=>21,"rating_factor"=>1.1],
        ["id"=>15,"age"=>22,"rating_factor"=>1],
        ["id"=>16,"age"=>23,"rating_factor"=>0.95],
        ["id"=>17,"age"=>24,"rating_factor"=>0.9],
        ["id"=>18,"age"=>25,"rating_factor"=>0.75]
    ];

    static public $fakePostcode = [
        ["id"=>4,"postcode_area"=>"LE10","rating_factor"=>1.35],
        ["id"=>5,"postcode_area"=>"PE3","rating_factor"=>1.1],
        ["id"=>6,"postcode_area"=>"WR2","rating_factor"=>0.9]
    ];

    static public $fakeAbi = [
        ["id"=>4,"abi_code"=>"22529902","rating_factor"=>0.95],
        ["id"=>5,"abi_code"=>"46545255","rating_factor"=>1.15],
        ["id"=>6,"abi_code"=>"52123803","rating_factor"=>1.2]
    ];

    // static private $fake_api_link = 'https://fakeapi.com/api/v1/regno/';

    static public function getQuote($request)
    {
        $rf_age = self::getRf('age', (int) $request->age);
        $rf_postcode = self::getRf('postcode', $request->postcode);
        $rf_abicode = self::getRf('abicode', $request->regNo);

        return self::BASE_PREMIUM * $rf_age * $rf_postcode * $rf_abicode;
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