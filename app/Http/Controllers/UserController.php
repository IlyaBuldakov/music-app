<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    private UserService $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    protected function create(Request $request)
    {
        Auth::login(
            $this->userService->create(
                $request->get('email'),
                $request->get('password')
            )
        );
        return redirect()->to("/");
    }

    protected function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        return redirect()->back();
    }

    protected function home()
    {
        return view('home', ['email' => Auth::user()->email]);
    }

    protected function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    protected function getOwnArtists() {
        return view('artists/byuser', ['artists' => $this->userService->getOwnArtists(Auth::id())]);
    }
}
