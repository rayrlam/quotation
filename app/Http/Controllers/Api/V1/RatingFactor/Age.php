<?php
namespace App\Http\Controllers\Api\V1\RatingFactor;

use App\Http\Controllers\Api\V1\RatingFactor\RatingFactorInterface;
use App\Http\Controllers\Api\V1\QuoteRepository;

class Age extends QuoteRepository implements RatingFactorInterface
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
        return round($this->rf->cost() * QuoteRepository::get('age', (int) $this->req->age),2);
    }
}