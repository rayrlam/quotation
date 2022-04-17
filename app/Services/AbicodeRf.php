<?php
namespace App\Services;
use App\Services\QuoteInterface;
use App\Helpers\QuoteHelper;
use App\Models\Abicode;

class AbicodeRf implements QuoteInterface{
    private $rf = 1.0;

    public function __construct(string $string)
    {   
        if($abi_code = QuoteHelper::getFakeAbicode($string))
        {
            $data = Abicode::where('abi_code', $abi_code)->first();
            if($data)
            {
                $this->rf = $data->rating_factor;
            }
        }
    }

    public function getRatingFactor(): float{
        return $this->rf;
    }
}
