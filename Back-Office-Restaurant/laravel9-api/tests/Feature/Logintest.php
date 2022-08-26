<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\LazilyRefreshesDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class Logintest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    //use LazilyRefreshDatabase;
    public function testLogin()
    {
        $user = factory(User::class)->create([
            'email' => 'uchihaitachi1304@gmail.com',
            'password' => bcrypt('uchihaitachi'),
        ]);
        $this->visit('/login');
        $this->submitForm('Login', [
            'email' => 'uchihaitachi1304@gmail.com',
            'password' => 'uchihaitachi',
        ]);
        $this->seePageIs('/beranda');
    }
}
