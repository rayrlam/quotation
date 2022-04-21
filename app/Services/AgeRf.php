<?php
namespace App\Services;
use App\Services\QuoteInterface;
use App\Models\Age;

class AgeRf implements QuoteInterface
{
    private $rf = 1.0;

    public function __construct(string $string)
    {
  
        $data = Age::where('age',(int) $string)->first();
        if($data)
        {
            $this->rf= $data->rating_factor;
        }
    }

    public function getRatingFactor(): float
    {
        return $this->rf;
    }
}