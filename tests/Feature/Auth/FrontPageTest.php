<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Tests\TestCase;

class FrontPageTest extends TestCase
{
    public function test_front_page_can_be_rendered()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
