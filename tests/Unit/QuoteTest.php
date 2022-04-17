<?php
namespace Tests\Unit;

use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Helpers\QuoteHelper;

class QuoteTest extends TestCase
{
    use RefreshDatabase;
 
    public function test_rating_factor_equal_627()
    {
        $this->seed();

        $payload = [
            'age' => 20,
            'postcode'  => 'PE3 8AF',
            'regNo'      => 'PJ63 LXR'
        ];

        $this->postJson('api/v1/quoting', $payload)
             ->assertStatus(200)
             ->assertJson([
                "data" => [
                    "result" => 627
                ]
            ]);
    }

    public function test_random_age_postcode_abicode()
    {
        $this->seed();

        $a = [];
        $code = 0;
        $arr = [
            'age' => QuoteHelper::$fakeAge,
            'postcode_area' => QuoteHelper::$fakePostcode,
            'abi_code'=> QuoteHelper::$fakeAbi
        ];

        foreach($arr as $k => $v) {
            $a[] = $v[rand(0,count($v)-1)];
        }

        foreach(QuoteHelper::$fakeRegNo as $k=>$v)
        {
            if($k == $a[2]['abi_code'])
            {
                $code = $v;
            }
        }

        $payload = [
            'age'       => $a[0]['age'],
            'postcode'  => $a[1]['postcode_area'],
            'regNo'     => $code
        ];

        $sum = QuoteHelper::BASE_PREMIUM;

        for($i=0; $i<3;$i++){
            $sum *= $a[$i]['rating_factor'];
        }

        $this->postJson('api/v1/quoting', $payload)
             ->assertStatus(200)
             ->assertJson([
                "data" => [
                    "result" => $sum
                ]
            ]);
    }
}