<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $username;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'username' => ['required', 'string', 'max:255', 'unique:users,username'],
        'email' => ['required', 'email', 'unique:users,email', 'max:255'],
        'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed']
    ];
    public function render()
    {
        return view('livewire.register');
    }

    public function register(){
        $this->validate();

        User::create([
             'name' => $this->name,
             'username' => $this->username,
             'email' => $this->email,
             'password' => Hash::make($this->password)
         ]);
        if(auth()->attempt([
           'email' => $this->email,
           'password' => $this->password
       ])){
            return redirect()->to(route('home'));
        }
        else{
            return redirect()->to(route('register'));
        }
    }
}
