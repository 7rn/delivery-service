<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $response = $this->withHeaders([
            'Authorization' => '',
        ])->json('POST', '/api/register', ['phone' => '098080808556', 'password' => 'testpass']);

        $response
            ->assertStatus(200)
            ->assertJson(json_encode(
                    [
                        "status" => "success",
                        "data"   => [
                            "result"  => [
                                "name"       => null,
                                "email"      => null,
                                "phone"      => "098080808556",
                                "updated_at" => "2018-03-26 21:20:55",
                                "created_at" => "2018-03-26 21:20:55",
                                "id"         => 3,
                            ],
                            "message" => "User successfully registered",
                        ],
                    ]
                )
            );
    }
}
