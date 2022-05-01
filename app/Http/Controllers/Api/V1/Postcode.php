<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\RatingInterface;
use App\Http\Controllers\Api\V1\RatingFactorHandler;

class Postcode extends RatingFactorHandler implements RatingInterface
{
    private $rating;
    private $postcode;
 
    public function __construct (RatingInterface $rating, string $postcode) {
        $this->postcode = $postcode;
        $this->rating = $rating;
    }

    public function cost() {
        return $this->rating->cost() * RatingFactorHandler::getRatingFactor('postcode', explode(" ", $this->postcode)[0]);
    }
}