<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;


class AuthController extends Controller
{
    /** Register new user
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(RegisterFormRequest $request)
    {
        $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'type_id' => $request->type,
            'subtype_id' => $request->subtype,
            'subsubtype_id' => $request->subsubtype,
        ]);

        Auth::login($user);

        if (Auth::check()) {
            return redirect('/home');
        }
    }


    /** Login user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginFormRequest $request)
    {
        $request->validated();

        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password))) {

            return redirect()->intended('/home');
        }

        $user = User::query()->where('email', $request->email)->first();

        if ($user && !Hash::check($request->password, $user->password)) {
            $errors = ['password' => 'Wrong password'];
        }

        return redirect()->back()->withErrors($errors);;
    }


    /** Logout user
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        $request->session()->flush();

        Auth::logout();

        return redirect('login');
    }
}
