<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Helpers\QuoteHelper;

class QuoteTest extends TestCase
{

    public function test_rating_factor_equal_627()
    {
        $payload = [
            'age' => 20,
            'postcode'  => 'PE3 8AF',
            'regNo'      => 'PJ63 LXR'
        ];

        $this->postJson('api/v1/quoting', $payload)
             ->assertStatus(200)
             ->assertJson([
                "data" => [
                    "result" => 627.00
                ]
            ]);
    }

    public function test_random_age_postcode_abicode()
    {
        $arr = [
            'age' => QuoteHelper::$fakeAge,
            'postcode_area' => QuoteHelper::$fakePostcode,
            'abi_code'=> QuoteHelper::$fakeAbi
        ];

        $times = 50;

        for($j=0; $j<$times; $j++)
        {
            $a = [];
            foreach($arr as $k => $v) 
            {
                $a[] = $v[rand(0,count($v)-1)];
            }

            $payload = [
                'age'       => $a[0]['age'],
                'postcode'  => $a[1]['postcode_area'],
                'regNo'     => QuoteHelper::$fakeRegNo[$a[2]['abi_code']]
            ];
    
            $sum = QuoteHelper::BASE_PREMIUM;
    
            for($i=0; $i<3;$i++)
            {
                $sum *= $a[$i]['rating_factor'];
            }
                
            $sum = round($sum,2);

            $this->postJson('api/v1/quoting', $payload)
            ->assertStatus(200)
            ->assertJson([
                "data" => [
                    "result" => $sum
                ]
            ]);
            
        }        
    }
}