<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\V1\Calculator;

class QuoteV1Controller extends Calculator
{
    public function quoting(Request $request) 
    {  
        return response()->json(["data" => ["result" => parent::cal($request)]]);
    }
}