<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login()
    {
        $user = Admin::first();


        $response = $this->post('/admin/auth/login', [
            'email' => $user->email,
            'password' => '123456',

        ]);

        $response->assertRedirectToRoute('admin.index');
    }

    public function test_login_memory()
    {
        $user = Admin::factory()->create();

        $response = $this->post('/admin/auth/login', [
            'email' => $user->email,
            'password' => '123456',

        ]);

        $response->assertRedirectToRoute('admin.index');
    }
}
