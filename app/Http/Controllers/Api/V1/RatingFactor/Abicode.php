<?php
namespace App\Http\Controllers\Api\V1\RatingFactor;

use App\Http\Controllers\Api\V1\RatingFactor\RatingFactorInterface;
use App\Http\Controllers\Api\V1\QuoteRepository;
use App\Helpers\QuoteHelper;

class Abicode extends QuoteRepository implements RatingFactorInterface
{
    private $regNo;
 
    public function __construct (string $regNo)
    {
        $this->regNo = $regNo;
    }

    public function cost() :float 
    {
        return QuoteRepository::get('regno', QuoteHelper::getFakeAbicode($this->regNo));
    }
}