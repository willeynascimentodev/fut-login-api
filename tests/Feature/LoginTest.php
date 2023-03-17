<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGenerateAccessToken()
    {
        $data = [
            'email' => 'willeynascimentooficial@gmail.com',
            'password' => 'abcds',
        ];

        $response = $this->post('api/login', $data);
        $response->assertStatus(201);
        $response->assertJsonStructure([
            'data' ,
            'message'
        ]);
    }

    public function testInvalidUser()
    {
        $data = [
            'email' => 'willeynascimentooficial@gmail.com',
            'password' => 'abcd',
        ];

        $response = $this->post('api/login', $data);
        $response->assertStatus(401);
        $response->assertJsonStructure([
            'data',
            'message'
        ]);
    }

    public function testInvalidData()
    {
        $data = [
            'email' => 'willeynascimentooficial@gmail.com',
            'passwor' => 'abcds',
        ];

        $response = $this->post('api/login', $data);
        $response->assertStatus(400);
        $response->assertJsonStructure([
            'message'
        ]);
    }
}
