<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    public function checkPassword($password, $user)
    {
        return Hash::check($password, $user->password);
    }

    // login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $user = User::where('username', $request->username)->first();
            if ($user) {
                if ($this->checkPassword($request->password, $user)) {
                    if ($user->is_active) {
                        if (Auth::attempt(['username' => $user->username, 'password' => $request->password])) {
                            return redirect()->route('home');
                        } else {
                            return redirect()->back()->withErrors(['username' => 'Username or password is incorrect'])->withInput();
                        }
                        return redirect()->route('home');
                    } else {
                        return redirect()->back()->withErrors(['username' => 'User is not active'])->withInput();
                    }
                } else {
                    return redirect()->back()->withErrors(['password' => 'Password is incorrect'])->withInput();
                }
            }
            return redirect()->back()->withErrors(['username' => 'User not found'])->withInput();
        }
    }
}
