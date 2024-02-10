<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignInRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a login view.
     */
    public function create(): View|Factory
    {
        return view('auth.passwords.reset');
    }

    public function store(SignInRequest $request)
    {
        $validared = $request->validated();
        $user = User::where('email', $validared)->first();
        $user->update($validared);

        return response()->json($user, 200);
    }
}
