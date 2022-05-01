<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\RatingInterface;
use App\Http\Controllers\Api\V1\RatingFactorHandler;

class Premium extends RatingFactorHandler implements RatingInterface
{
    private $rating;
    const BASE_PREMIUM = 500;
  
    public function __construct (RatingInterface $rating) {
        $this->rating = $rating;
    }

    public function cost() {
        return round($this->rating->cost() * self::BASE_PREMIUM, 2); 
    }
}