<?php 
namespace App\Http\Controllers\Api\V3;



interface RatingFactorInterface
{
    public function getRatingFactor($tname, $fname, $value): float;
} 