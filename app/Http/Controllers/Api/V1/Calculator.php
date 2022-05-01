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
        $item = new Abicode($request->regNo);
        $item = new Postcode($item, $request->postcode);
        $item = new Age($item, $request->age);
        $item = new Premium($item);
        
        return  $item->cost();
    }
}