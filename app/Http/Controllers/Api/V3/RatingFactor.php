<?php
namespace App\Http\Controllers\Api\V3;

use App\Http\Controllers\Api\V3\RatingFactorInterface;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\Helpers\QuoteHelper;


class RatingFactor extends Controller implements RatingFactorInterface
{
    private $items;

    private $tables = [
        'age'=>['tname'=>'ages','fname'=>'age'], 
        'postcode'=>['tname'=>'postcodes','fname'=>'postcode_area'],
        'regno'=>['tname'=>'abicodes','fname'=>'abi_code'] 
    ];

    public function getRatingFactor($tname, $fname, $value): float
    {   
        $data = DB::select('select rating_factor from ' .$tname. ' where ' .$fname. ' = ? Limit 1', [$value]);
        if(count($data))
        {
            return (float) $data[0]->rating_factor;
        }else
        {
            return 1.0;
        }
    }

    public function add($name, $value){
        $name = strtolower($name);
        $tname = $this->tables[$name]['tname'];
        $fname = $this->tables[$name]['fname'];
        switch($name)
        {
            case 'regno':
                $value = QuoteHelper::getFakeAbicode($value);
                break;

            case 'postcode':
                $value = explode(" ", $value)[0];
                break;
        }
 
        $this->items[$tname] = self::getRatingFactor($tname, $fname, $value);
    }

    public function getTotal()
    {
        $rf = 1.00;
        
        $callback =
            function ($value, $item) use (&$rf)
            {
                $rf *= $value;
            };
        
        array_walk($this->items, $callback);
        return round($rf * QuoteHelper::BASE_PREMIUM, 2);
    }
}