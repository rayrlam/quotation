<?php
namespace App\Http\Controllers\Api\V1\RatingFactor;

use App\Http\Controllers\Api\V1\RatingFactor\RatingFactorInterface;
use App\Http\Controllers\Api\V1\QuoteRepository;

class Postcode extends QuoteRepository implements RatingFactorInterface
{
    private $rf;
    public $req;
 
    public function __construct (?RatingFactorInterface $rf = null) 
    {   
        $this->rf = $rf;
        $this->req = $rf->req;
    }

    public function cost(): float
    {
        return $this->rf->cost() * QuoteRepository::get('postcode', explode(" ", $this->req->postcode)[0]);
    }
}