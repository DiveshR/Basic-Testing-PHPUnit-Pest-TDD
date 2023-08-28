<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_redirects_to_products(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

       $response =  $this->post('login', [
            'email' => 'admin@gmail.com',
            'password' => 'password',
        ]);

        $response->assertStatus(302); //used for redirection
        $response->assertRedirect('/products');


    }

    public function test_unauthenticated_user_cannot_access_products(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(302); //used for redirection
        $response->assertRedirect('login');
    }
}
