<?php
namespace App\Http\Controllers\Api\V4;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Api\V4\Age;
use App\Http\Controllers\Api\V4\Abicode;
use App\Http\Controllers\Api\V4\Postcode;
use App\Http\Controllers\Api\V4\Premium;

class QuoteV4Controller extends Controller
{
    public function quoting(Request $request)
    {  
        $item = new Abicode($request->regNo);
        $item = new Postcode($item, $request->postcode);
        $item = new Age($item, $request->age);
        $item = new Premium($item);
        return ["data" => ["result" => $item->cost()]];
    }
}