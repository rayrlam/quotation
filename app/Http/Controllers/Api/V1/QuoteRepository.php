<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Support\Facades\DB;

class QuoteRepository
{
    private $tables = [
        'age'=>['tname'=>'ages','fname'=>'age'], 
        'postcode'=>['tname'=>'postcodes','fname'=>'postcode_area'],
        'regno'=>['tname'=>'abicodes','fname'=>'abi_code'] 
    ];

    public function get($name, $value): float
    {   
        $tname = $this->tables[$name]['tname'] ?? null;
        $fname = $this->tables[$name]['fname'] ?? null;
        if(is_null($tname) || is_null($fname))
        {
            return 1.0;
        }

        $data = DB::select('SELECT rating_factor FROM ' .$tname. ' WHERE ' .$fname. ' = ? LIMIT 1', [$value]);
        if(count($data))
        {
            return (float) $data[0]->rating_factor;
        }
        else
        {
            return 1.0;
        }
    }
}