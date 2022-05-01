<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\RatingInterface;
use App\Http\Controllers\Api\V1\RatingFactorHandler;

class Age extends RatingFactorHandler implements RatingInterface
{
    private $rating;
    private $age;
 
    public function __construct (RatingInterface $rating, string $age) {
        $this->rating = $rating;
        $this->age = $age;
    }

    public function cost() {
        return $this->rating->cost() * RatingFactorHandler::getRatingFactor('age', (int) $this->age);
    }
}