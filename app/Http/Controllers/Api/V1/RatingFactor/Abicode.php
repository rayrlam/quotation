<?php
namespace App\Http\Controllers\Api\V1\RatingFactor;

use App\Http\Controllers\Api\V1\RatingFactor\RatingFactorInterface;
use App\Http\Controllers\Api\V1\QuoteRepository;
use App\Helpers\QuoteHelper;

class Abicode extends QuoteRepository implements RatingFactorInterface
{
    private $rf;
    public $req;

    public function __construct(?RatingFactorInterface $rf = null)
    {
        $this->rf = $rf;
        $this->req = $rf->req;
    }

    public function cost(): float 
    {
        return $this->rf->cost() * QuoteRepository::get('regNo', QuoteHelper::getFakeAbicode($this->req->regNo));
    }
}