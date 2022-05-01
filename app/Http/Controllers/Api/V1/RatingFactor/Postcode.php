<?php
namespace App\Http\Controllers\Api\V1\RatingFactor;

use App\Http\Controllers\Api\V1\RatingFactor\RatingFactorInterface;
use App\Http\Controllers\Api\V1\QuoteRepository;

class Postcode extends QuoteRepository implements RatingFactorInterface
{
    private $rf;
    private $postcode;
 
    public function __construct (RatingFactorInterface $rf, string $postcode) 
    {
        $this->postcode = $postcode;
        $this->rf = $rf;
    }

    public function cost() :float
    {
        return $this->rf->cost() * QuoteRepository::get('postcode', explode(" ", $this->postcode)[0]);
    }
}