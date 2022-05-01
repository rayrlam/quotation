<?php
namespace App\Http\Controllers\Api\V4;

use App\Http\Controllers\Api\V4\RatingInterface;
use App\Http\Controllers\Api\V4\RatingFactorHandler;
use App\Helpers\QuoteHelper;

class Abicode extends RatingFactorHandler implements RatingInterface
{
    private $rating;
    private $regNo;
 
    public function __construct (string $regNo) {
        $this->regNo = $regNo;
    }

    public function cost() {
        $value = QuoteHelper::getFakeAbicode($this->regNo);
        return RatingFactorHandler::getRatingFactor('regno', $value);
    }
}