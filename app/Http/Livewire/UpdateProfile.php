<?php

namespace App\Http\Livewire;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdateProfile extends Component
{
    public $user; // passed to component

    public $name;

    public $email;

    public $username;

    public $password;

    public $password_confirmation;

    public function render()
    {
        return view('livewire.update-profile');
    }

    public function updateName()
    {
        $this->validate(['name' => ['required', 'string', 'min:3', 'max:255']]);
        $this->user = UserController::updateOrCreateUser(['name' => $this->name], $this->user->id);
    }

    public function updateEmail()
    {
        $this->validate(['email' => ['required', 'email', 'unique:users,email', 'max:255']]);
        $this->user = UserController::updateOrCreateUser(['email' => $this->email], $this->user->id);
    }

    public function updateUsername()
    {
        $this->validate(['username' => ['required', 'string', 'unique:users,username', 'max:255']]);
        $this->user = UserController::updateOrCreateUser(['email' => $this->username], $this->user->id);
    }

    public function updatePassword()
    {
        $this->validate(['password' => ['required', 'string', 'min:8', 'max:255', 'confirmed']]);
        $this->user = UserController::updateOrCreateUser(['password' => Hash::make($this->password)], $this->user->id);
    }
}
