<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $fetchname = explode(" ", $request->name);
        $username = strtolower($fetchname[1].'-'.rand(100, 999));

        $getcodeForm = explode("-", $username);
        $randomStr = strtolower(Str::random(3));
        $codeForm = $getcodeForm[1];
        $code = str_pad($codeForm.$randomStr, 5, '0', STR_PAD_LEFT);

        $link = $request->header('Origin').'/account/'.$username;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $username,
            'uu_id' => $code,
            'password' => Hash::make($request->password),
            'link' => $link,
        ]);

        event(new Registered($user));

        return redirect($link);
    }
}
