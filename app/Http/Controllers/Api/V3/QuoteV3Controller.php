<?php
namespace App\Http\Controllers\Api\V3;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\QuoteHelper;

use App\Http\Controllers\Api\V3\RatingFactor;

class QuoteV3Controller extends Controller
{
    public function quoting(Request $request)
    {  
        $items = new RatingFactor();
        $items->add('age', $request->age);
        $items->add('postcode', $request->postcode);
        $items->add('regNo', $request->regNo);
        return ["data" => ["result" => $items->getTotal()]];
    }
}