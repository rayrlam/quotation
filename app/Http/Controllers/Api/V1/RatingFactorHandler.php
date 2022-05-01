<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\V1\Age;
use App\Http\Controllers\Api\V1\Abicode;
use App\Http\Controllers\Api\V1\Postcode;
use App\Http\Controllers\Api\V1\Premium;

class RatingFactorHandler
{
    private $tables = [
        'age'=>['tname'=>'ages','fname'=>'age'], 
        'postcode'=>['tname'=>'postcodes','fname'=>'postcode_area'],
        'regno'=>['tname'=>'abicodes','fname'=>'abi_code'] 
    ];

    public function getRatingFactor($name, $value): float
    {   
        $tname = $this->tables[$name]['tname'] ?? null;
        $fname = $this->tables[$name]['fname'] ?? null;
        if(is_null($tname) || is_null($fname)){
            return 1.0;
        }

        $data = DB::select('select rating_factor from ' .$tname. ' where ' .$fname. ' = ? Limit 1', [$value]);
        if(count($data))
        {
            return (float) $data[0]->rating_factor;
        }else
        {
            return 1.0;
        }
    }

    public function rf($request)
    {
        $item = new Abicode($request->regNo);
        $item = new Postcode($item, $request->postcode);
        $item = new Age($item, $request->age);
        $item = new Premium($item);
        return  $item->cost();
    }
}