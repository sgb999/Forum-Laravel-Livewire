<?php

namespace App\Http\Livewire;

use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Redirector;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\{
    View\Factory,
    View\View,
    Foundation\Application as contractsApplication
};

class Login extends Component
{
    public $email;
    public $password;
    /**
     * @var array|array[]
     */
    protected array $rules = [
        'email' => ['required', 'email', 'max:255'],
        'password' => ['required', 'string', 'min:8', 'max:255']
    ];

    /**
     * @return View|Application|Factory|contractsApplication
     */
    public function render(): View|Application|Factory|contractsApplication
    {
        return view('livewire.login');
    }

    /**
     * @return Redirector|RedirectResponse|void
     */
    public function login()
    {
        $this->validate();

        if (auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->route('home');
        }
        else {
            session()->flash('login', 'Entered Credentials do not match our records.');
        }
    }
}
