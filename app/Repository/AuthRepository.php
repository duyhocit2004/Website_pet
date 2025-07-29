<?php

namespace App\Repository;

use App\Mail\MailGoogle;
use App\Models\User;

use Illuminate\Support\Str;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\AppServiceProvider;
use Illuminate\Support\Facades\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthRepository
{
    public function __construct()
    {
        //
    }

    public function login($request)
    {
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        // $data = [
        //     'email' => 'hoangduy200456@gmail.com',
        //     'password' => 12345678,
        // ];
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $findUser = User::Where('email', $user->email)->first();
            if (Auth::user()->role === config('contast.User')) {
                $findUser->update([
                    'status' => config('contast.active')
                ]);
                return redirect()->route('home')->with('success', 'Bạn đã đăng nhập thành công');
            } else {
                Auth::logout(); // Không đúng quyền
                return redirect()->route('formLogin')->with('error', 'Tài khoản không có quyền truy cập');
            }
        }

        return redirect()->route('formLogin')->with('error', 'Tài khoản hoặc mật khẩu bị sai');

    }
    public function loginAdmin($request)
    {

        $credentials = $request->only('email', 'password');
        // dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials)) {

            if (Auth::user()->role === config('contast.Admin')) {
                return redirect('admin/DoashBoard')->with('success', 'Bạn đã đăng nhập thành công');
            } else {
                Auth::logout(); // Không đúng quyền
                return redirect()->route('formLoginAdmin')->with('error', 'Tài khoản không có quyền truy cập');
            }
        } else {
            return redirect()->route('formLoginAdmin')->with('error', 'Tài khoản hoặc mật khẩu bị sai');
        }
    }
    public function register($data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],

        ]);
    }

    public function logout()
    {
        $user = Auth::user();
        $findUser = User::where('email', $user->email)->first();
        $findUser->update([
            'status' => config('contast.inactive')
        ]);
        Auth::logout();
        return redirect()->route('home')->with('success', 'Bạn đã đăng xuất thành công');
    }
    public function ForgotPassword($request)
    {
        $user = User::Where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Email không tồn tại');
        }

        if ($user) {
            $password = Str::random(10);

            $user->update([
                'password' => Hash::make($password),
            ]);

            Mail::to($request->email)->send(new ForgotPasswordMail($password));

            return redirect()->route('formLogin')->with('success', 'Mật khẩu mới đã được gửi vào email của bạn');
        }
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $findUser = user::Where('email', $user->getEmail())->first();
            $password = Str::random(10);
            if (!$findUser) {
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($password),
                ]);

                Mail::to($newUser->email)->send(new MailGoogle($password));

                Auth::login($newUser);
                return redirect()->route('home')->with('success', 'Đăng nhập thành công , Vui lòng kiểm tra email để nhận mật khẩu');
            } else {
                Auth::login($findUser);
                return redirect()->route('home')->with('success', 'Đăng nhập thành công');
            }
        } catch (\Exception $e) {
            return redirect()->route('formLogin')->with('error', 'Đăng nhập thất bại');
        }

    }
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();

            $findUser = user::Where('email', $user->getEmail())->first();
            $password = Str::random(10);
            if (!$findUser) {
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($password),
                ]);

                Mail::to($newUser->email)->send(new MailGoogle($password));

                Auth::login($newUser);
                return redirect()->route('home')->with('success', 'Đăng nhập thành công , Vui lòng kiểm tra email để nhận mật khẩu');
            } else {
                Auth::login($findUser);
                return redirect()->route('home')->with('success', 'Đăng nhập thành công');
            }
        } catch (\Exception $e) {
            return redirect()->route('formLogin')->with('error', 'Đăng nhập thất bại');
        }

    }

    public function redirectToBitbucket()
    {
        return Socialite::driver('bitbucket')->redirect();
    }
    public function handleBitbucketCallback()
    {
        try {
            $user = Socialite::driver('bitbucket')->user();

            $findUser = user::Where('email', $user->getEmail())->first();
            $password = Str::random(10);
            if (!$findUser) {
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($password),
                ]);

                Mail::to($newUser->email)->send(new MailGoogle($password));

                Auth::login($newUser);
                return redirect()->route('home')->with('success', 'Đăng nhập thành công , Vui lòng kiểm tra email để nhận mật khẩu');
            } else {
                Auth::login($findUser);
                return redirect()->route('home')->with('success', 'Đăng nhập thành công');
            }
        } catch (\Exception $e) {
            return redirect()->route('formLogin')->with('error', 'Đăng nhập thất bại');
        }

    }
}