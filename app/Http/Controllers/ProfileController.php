<?php


namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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
        if (!User::find($id))
            abort(404);
        $user = User::find($id);
        $tweets = $user->tweets()->orderBy('updated_at', 'desc')->paginate();
        return view('profile', compact('user', 'tweets'));
    }

    public function toggleDarkMode(Request $request)
    {
        if ($request->toggle === 'true') {
            $user = User::find(auth()->user()->id);
            if ($user) {
                $user->dark_mode = true;
                $user->save();
            }
        } else {
            $user = User::find(auth()->user()->id);
            if ($user) {
                $user->dark_mode = false;
                $user->save();
            }
        }
        return;
    }
}
