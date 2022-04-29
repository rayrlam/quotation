<?php
namespace App\Http\Controllers\Api\V4;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Api\V4\Age;
use App\Http\Controllers\Api\V4\Abicode;
use App\Http\Controllers\Api\V4\Postcode;

class QuoteV4Controller extends Controller
{
    public function quoting(Request $request)
    {  
        $item = new Abicode($request->regNo);
        $item = new Postcode($item, $request->postcode);
        $item = new Age($item, $request->age);
        return ["data" => ["result" => $item->cost()]];
    }
}