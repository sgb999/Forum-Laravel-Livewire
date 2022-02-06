<?php

namespace App\Http\Livewire;

use App\Http\Requests\UserLoginRequest;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required', 'string', 'min:8']
    ];

    public function render()
    {
        return view('livewire.login');
    }

    public function login()
    {
        $this->validate();

        if (auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->to(route('home'));
        }
        else{
            session()->flash('login', 'Entered Credentials do not match our records.');
        }
    }
}
