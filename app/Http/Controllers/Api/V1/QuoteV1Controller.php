<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\RatingFactorHandler;

class QuoteV1Controller extends Controller
{
    public function quoting(Request $request)
    {  
        return ["data" => ["result" => RatingFactorHandler::rf($request)]];
    }
}