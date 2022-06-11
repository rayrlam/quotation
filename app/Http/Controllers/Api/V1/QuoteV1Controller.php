<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\V1\RatingFactor\Age;
use App\Http\Controllers\Api\V1\RatingFactor\Abicode;
use App\Http\Controllers\Api\V1\RatingFactor\Postcode;
use App\Http\Controllers\Api\V1\RatingFactor\Premium;

class QuoteV1Controller extends Controller
{
    public function quoting(Request $request)
    {  
        return response()->json($this->cal($request));
    }

    private function cal(Request $request): array
    {
        return  ["data" => ["result" =>  
                    (new Age(
                        new Postcode(
                            new Abicode(
                                new Premium($request)
                                )                            
                            )
                        )
                    )->cost() 
                ]];
    }
}