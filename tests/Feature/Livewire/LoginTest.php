<?php

namespace Livewire;

use App\Http\Livewire\Login;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\{
    RefreshDatabase,
    WithFaker
};
use Tests\TestCase;


class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_renders_successfully(): void
    {
        $response = $this->get(route('loginPage'));

        $response->assertStatus(200);
        $response->assertSeeLivewire(Login::class);
    }

    /**
     * Test that a user is able to successfully login
     *
     * @return void
     */
    public function test_login_successful(): void
    {
        $user = User::factory()->create(['password' => Hash::make('password')]);

        $login = Livewire::test(Login::class)
            ->set('email', $user->email)
            ->set('password', 'password');
        $login->call('login')->assertHasNoErrors(['email', 'password'])->assertRedirect(route('home'));
    }

    /**
     * Test that a user who is logged in is unable to view the login page
     *
     * @return void
     */
    public function test_logged_in_user_cannot_view_login(): void
    {
        $this->actingAs(User::factory()->create());

        $response = $this->get(route('loginPage'));

        $response->assertStatus(302);
        $response->assertDontSeeLivewire(Login::class);
    }
}
