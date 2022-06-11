<?php
namespace App\Http\Controllers\Api\V1\RatingFactor;

use App\Http\Controllers\Api\V1\RatingFactor\RatingFactorInterface;
use App\Http\Controllers\Api\V1\QuoteRepository;
use App\Helpers\QuoteHelper;

use Illuminate\Http\Request;

class Premium extends QuoteRepository implements RatingFactorInterface
{
    private const BASE_PREMIUM = 500;
    public $req;

    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function cost(): float 
    {
        return self::BASE_PREMIUM; 
    }
}