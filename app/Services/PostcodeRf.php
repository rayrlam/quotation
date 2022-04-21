<?php
namespace App\Services;
use App\Services\QuoteInterface;
use App\Models\Postcode;

class PostcodeRf implements QuoteInterface
{
    private $rf = 1.0;

    public function __construct(string $string)
    {
        $data = Postcode::where('postcode_area', explode(" ", $string)[0])->first();
        if($data)
        {
            $this->rf= $data->rating_factor;
        }
    }

    public function getRatingFactor(): float{
        return $this->rf;
    }
}