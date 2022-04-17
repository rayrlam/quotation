<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\QuoteHelper;

class QuoteController extends Controller
{
    public function quoting(Request $request)
    {   
        return ["Quoting Result"=>QuoteHelper::getQuote($request)];  
    }
}
