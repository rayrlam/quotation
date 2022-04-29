<?php
namespace App\Http\Controllers\Api\V4;

use Illuminate\Support\Facades\DB;

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
}