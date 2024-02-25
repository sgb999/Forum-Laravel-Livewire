<?php

namespace Livewire;

use App\Http\Livewire\Register;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that th page loads
     */
    public function test_renders_successfully(): void
    {
        $response = $this->get(route('registerPage'));

        $response->assertStatus(200);
        $response->assertSeeLivewire(Register::class);
    }

    /**
     * Test that login functionality works
     *
     * @return void
     */
    public function test_register_account_and_login()
    {
        $register = Livewire::test(Register::class)->set('name', 'John Smith')
            ->set('username', 'test1234')
            ->set('email', 'test@example.com')
            ->set('password', 'password')
            ->set('password_confirmation', 'password');

        $register->call('register');
        $register->assertStatus(200);
        $register->assertRedirect(route('home'));
    }

    /**
     * Test validation works
     *
     * @return void
     */
    public function test_invalid_register()
    {
        $register = Livewire::test(Register::class)->set('name', 'John Smith')
            ->set('email', 'test@example.com')
            ->set('password', 'pass')
            ->set('password_confirmation', 'passd');

        $register->call('register')->assertHasErrors(['username' => 'required']);
    }

    /**
     * Test that a user who is logged in is unable to view the register page
     *
     * @return void
     */
    public function test_logged_in_user_cannot_view_sign_up()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->get(route('registerPage'));

        $response->assertStatus(302);
        $response->assertDontSeeLivewire(Register::class);
    }
}
