<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */


    public function testDatabase()
    {
        $this->assertDatabaseHas('users', [
            'email' => 'jdidinya@cytonn.com'
        ]);
    }
}
