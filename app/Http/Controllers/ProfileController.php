<?php


namespace App\Http\Controllers;

use App\User;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['profile']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function profile($id)
    {
        $user = User::find($id);
        $tweets = $user->tweets()->get();
        return view('profile', compact('user', 'tweets'));
    }
}
