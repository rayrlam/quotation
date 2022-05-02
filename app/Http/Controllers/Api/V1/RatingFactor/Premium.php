<?php
namespace App\Http\Controllers\Api\V1\RatingFactor;

use App\Http\Controllers\Api\V1\RatingFactor\RatingFactorInterface;
use App\Http\Controllers\Api\V1\QuoteRepository;

class Premium extends QuoteRepository implements RatingFactorInterface
{
    const BASE_PREMIUM = 500;
    private $rf;
 
    public function __construct (RatingFactorInterface $rf) 
    {
        $this->rf = $rf;
    }

    public function cost(): float
    {
        return round($this->rf->cost() * self::BASE_PREMIUM, 2); 
    }
}