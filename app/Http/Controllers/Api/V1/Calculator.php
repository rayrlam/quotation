<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\V1\RatingFactor\Age;
use App\Http\Controllers\Api\V1\RatingFactor\Abicode;
use App\Http\Controllers\Api\V1\RatingFactor\Postcode;
use App\Http\Controllers\Api\V1\RatingFactor\Premium;

class Calculator extends Controller
{
    public function cal($request): float
    {
        return (new Premium(
                    new Age(
                        new Postcode(
                            new Abicode($request->regNo), 
                            $request->postcode
                        ),
                        $request->age
                    )
                ))->cost();
    }
}