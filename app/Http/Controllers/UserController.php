<?php

namespace App\Http\Controllers;

use App\Http\Requests\{
    UserStoreRequest,
    UserLoginRequest
};
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function loginPage(){
        $page_title = 'Assassins Creed Forum - Login';

        return view('general.pages.login', compact(['page_title']));
    }

    public function login(UserLoginRequest $request)
    {
        $credentials = $request->validated();

        if (auth()->attempt($credentials)) {
            return redirect()->to(route('home'));
        }
        else{
            return redirect()->back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function register(UserStoreRequest $request){
            $validated = $request->validated();

            User::create([
                'name' => $validated['name'],
                'username' => $validated['username'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password'])
            ]);
            if(auth()->attempt([
                'email' => $validated['email'],
                'password' => $validated['password']
            ])){
                return redirect()->to(route('home'));
            }
            else{
                return redirect()->to(route('register'));
            }
    }

    public function userPage(User $user)
    {
        $page_title = 'Assassins Creed Forum - ' . $user->username . 'Profile';
        return view('general.pages.profile', compact(['page_title', 'user']));
    }

    public function registerPage()
    {
        $page_title = 'Assassins Creed Forum - Create an Account';
        return view('general.pages.register', compact(['page_title']));
    }

    public function logOutMethod(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->back();
    }
}
