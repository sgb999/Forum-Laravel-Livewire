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

    public function userPage(User $user)
    {
        $page_title = 'Assassins Creed Forum - ' . $user->username . 'Profile';
        return view('general.pages.profile', compact(['page_title', 'user']));
    }

    public static function updateOrCreateUser(Array $userRequest, $id = null)
    {
        return User::updateOrCreate(['id' => $id], $userRequest);
    }

    public function updateProfilePage(User $user)
    {
        abort_if($user->id !== auth()->id(), 403);
        $page_title = 'Assassins Creed Forum - ' . $user->username . 'Update Profile';
        return view('general.pages.profile-update', compact(['page_title', 'user']));
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
