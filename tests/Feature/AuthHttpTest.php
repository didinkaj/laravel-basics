<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Blog\Repositories\Blog\BlogRepository;
use Blog\User;
use Illuminate\Support\Facades\Auth;

class AuthHttpTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /*
     * login user method
     * */
    public function loginUser()
    {

        $user = factory(User::class)->create();

        return Auth::login($user, true);


    }

    /*
     * testing authenticate user using the loginUser method
     * */
    public function testAuthUser()
    {
        $this->loginUser();

        $response = $this->get('/home');

        $response->assertStatus(200);

       // dd(Auth::user());

    }

}


