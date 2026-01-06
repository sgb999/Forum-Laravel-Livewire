<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userPage(User $user)
    {
        $page_title = 'Assassins Creed Forum - '. $user->username.'Profile';

        return view('general.pages.profile', compact(['page_title', 'user']));
    }

    public static function updateOrCreateUser(array $userRequest, $id = null) : User
    {
        return User::updateOrCreate(['id' => $id], $userRequest);
    }

    public function updateProfilePage(User $user)
    {
        abort_if($user->id !== auth()->id(), 403);
        $page_title = 'Assassins Creed Forum - '.$user->username.'Update Profile';

        return view('general.pages.profile-update', compact(['page_title', 'user']));
    }

    /**
     * Logs out the authenticated user, invalidates the session, regenerates the CSRF token,
     * and redirects the user back to the previous page.
     *
     * @param Request $request The HTTP request instance.
     * @return RedirectResponse Redirect response to the previous page.
     */
    public function logOutMethod(Request $request) : RedirectResponse
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->back();
    }
}
