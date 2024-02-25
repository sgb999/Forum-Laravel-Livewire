<?php

namespace App\Http\Livewire;

use App\Http\Controllers\UserController;
use Illuminate\Contracts\Foundation\Application as contractsApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Redirector;

class Register extends Component
{
    public $name;

    public $username;

    public $email;

    public $password;

    public $password_confirmation;

    protected array $rules = [
        'name' => ['required', 'string', 'max:255'],
        'username' => ['required', 'string', 'max:255', 'unique:users,username'],
        'email' => ['required', 'email', 'unique:users,email', 'max:255'],
        'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
    ];

    /**
     * Render the webpage
     */
    public function render(): View|Application|Factory|contractsApplication
    {
        return view('livewire.register');
    }

    /**
     * This function is to register the user to the webpage, if the user fills in the fields incorrectly this is displayed
     * in the web browser
     */
    public function register(): Redirector|RedirectResponse
    {
        $this->validate();

        UserController::updateOrCreateUser([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        if (
            auth()->attempt([
                'email' => $this->email,
                'password' => $this->password,
            ])
        ) {
            return redirect()->route('home');
        }

        return redirect()->route('register');
    }
}
