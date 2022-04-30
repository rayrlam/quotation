<?php
namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AgeRf;
use App\Services\PostcodeRf;
use App\Services\AbicodeRf;
use App\Helpers\QuoteHelper;

class QuoteV2Controller extends Controller
{
    public function quoting(Request $request)
    {  
        $sum = QuoteHelper::BASE_PREMIUM;

        $classes = [
                    ['class'=>AgeRf::class,'val'=>(int) $request->age],
                    ['class'=>PostcodeRf::class, 'val'=>$request->postcode],
                    ['class'=>AbicodeRf::class, 'val'=>$request->regNo]
                ];

        foreach($classes as $v) 
        {
            $class = $v['class'];
            $sum *= (new $class($v['val']))->getRatingFactor();
        }
        
        return ["data" => ["result" => round($sum,2)]];  
    }
}