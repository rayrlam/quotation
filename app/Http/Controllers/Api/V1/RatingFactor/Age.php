<?php
namespace App\Http\Controllers\Api\V1\RatingFactor;

use App\Http\Controllers\Api\V1\RatingFactor\RatingFactorInterface;
use App\Http\Controllers\Api\V1\QuoteRepository;

class Age extends QuoteRepository implements RatingFactorInterface
{
    private $rf;
    private $age;
 
    public function __construct (RatingFactorInterface $rf, string $age)
    {
        $this->rf = $rf;
        $this->age = $age;
    }

    public function cost(): float
    {
        return $this->rf->cost() * QuoteRepository::get('age', (int) $this->age);
    }
}