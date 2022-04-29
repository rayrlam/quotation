<?php
namespace App\Http\Controllers\Api\V4;

use App\Http\Controllers\Api\V4\RatingFactorHandler;

class Postcode extends RatingFactorHandler implements Rating
{
    private $rating;
    private $postcode;
 
    public function __construct (Rating $rating, string $postcode) {
        $this->postcode = $postcode;
        $this->rating = $rating;
    }

    public function cost() {
        return $this->rating->cost() * RatingFactorHandler::getRatingFactor('postcode', explode(" ", $this->postcode)[0]);
    }
}