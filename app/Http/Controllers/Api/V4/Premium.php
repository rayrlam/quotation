<?php
namespace App\Http\Controllers\Api\V4;

use App\Http\Controllers\Api\V4\RatingInterface;
use App\Http\Controllers\Api\V4\RatingFactorHandler;
use App\Helpers\QuoteHelper;

class Premium extends RatingFactorHandler implements RatingInterface
{
    private $rating;
  
    public function __construct (RatingInterface $rating) {
        $this->rating = $rating;
    }

    public function cost() {
        return round($this->rating->cost() * QuoteHelper::BASE_PREMIUM, 2); 
    }
}