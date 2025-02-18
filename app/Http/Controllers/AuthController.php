<?php

namespace App\Http\Controllers;

use App\Mail\CodeMail;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showSignup()
    {
        return view("auth.register");
    }
    public function showLogin()
    {
        return view('auth.login');
    }
    public function showProfile()
    {
        $posts = Post::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('profile.profile', ['posts' => $posts]);
    }
    public function showForgetPassword()
    {
        return view('auth.forgetPassword');
    }
    public function updateProfile()
    {
        request()->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png',
        ]);
        if (request()->hasFile('file')) {
            $file = request()->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('../public/images/profiles/'), $filename);
            $user = User::find(Auth::user()->id);
            $user->profile_picture = $filename;
            $user->save();
            return to_route('show.profile');
        }
    }
    public function deleteProfile()
    {
        $user = User::find(Auth::user()->id);
        $user->profile_picture = '1.png';
        $user->save();
        return to_route('show.profile');
    }
    public function showConfirmEmail()
    {
        return view('auth.confirmemail');
    }
    public function signup()
    {
        request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);
        session(['name' => request()->name]);
        session(['email' => request()->email]);
        session(['password' => request()->password]);
        session(['code' => random_int(100000, 999999)]);
        // Mail::to(session('email'))->send(new CodeMail(session('code')));
        return to_route('confirm.email');

    }
    public function storeUser()
    {
        if (request()->has('get_code')) {
            session(['code' => random_int(100000, 999999)]);
            // Mail::to(session('email'))->send(new CodeMail(session('code')));
            return back();
        }
        // if (!strcmp(session('code'), request()->code)) {
            $user = new User();
            $user->name = session('name');
            $user->email = session('email');
            $user->password = Hash::make(session('password'));
            $user->type = 'user';
            $user->save();
            Auth::login($user);
            return to_route('home');
        // } else {
        //     return back();
        // }

    }
    public function login()
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $email = request()->email;
        $password = request()->password;
        $user = User::where('email', $email)->first();
        if ($user) {
            if (Hash::check($password, $user->password)) {
                Auth::login($user);
                return to_route('home');
            } else {
                return back();
            }
        }

    }
    public function logout()
    {
        Auth::logout();
        return to_route('home');
    }
    public function sendMail()
    {
        request()->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        session(['email' => request()->email]);
        session(['code' => random_int(100000, 999999)]);
        Mail::to(session('email'))->send(new CodeMail(session('code')));
        return to_route('show.confirm.email.reset.password');
    }
    public function showConfirmEmailToResetPassword()
    {
        return view('auth.confirmemailtoresetpassword');
    }
    public function confirmEmailToResetPassword()
    {
        if (request()->has('resend_code')) {
            session(['code' => random_int(100000, 999999)]);
            Mail::to(session('email'))->send(new CodeMail(session('code')));
            return back();
        }
        request()->validate([
            'code' => 'required|numeric',
        ]);
        if (!strcmp(session('code'), request()->code)) {
            session(['can_reset_password' => true]);
            return to_route('show.reset.password');
        } else {
            return back()->withErrors('verification code is incorrect');
        }
    }
    public function showResetPassword()
    {
        return view('auth.resetpassword');
    }
    public function resetPassword()
    {
        request()->validate([
            'password' => 'required|min:8|confirmed',
        ]);
        $user = User::where('email', session('email'))->first();
        if ($user) {
            $user->password = request()->password;
            $user->save();
            Auth::login($user);
            session()->forget('can_reset_password');
            return to_route('home');
        } else {
            return back()->withErrors('user not found');
        }
    }
}
