<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Service\Auth\AuthService;

use App\Service\Auth\IAuthService;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function formlogin()
    {
        return view('client.login.login');
    }
    public function login(Request $request)
    {
        return $this->authService->login($request);
        //  redirect()->route('home')->with('success','Bạn đã đăng nhập thành công');
    }
    public function formLoginAdmin()
    {
        return view('admin.Auth.LoginAdmin');
    }
    public function loginAdmin(Request $request)
    {
        // dd($request->all());
        return $this->authService->loginAdmin($request);
    }
    public function formRegister()
    {
        return view('client.login.register');
    }
    public function register(Request $request)
    {
        $this->authService->register($request);
        return redirect()->route('formLogin')->with('success', 'Bạn đã đăng ký thành công');
    }
    public function formForgotPassword()
    {
        return view('client.login.forgotpassword');
    }
    public function forgotPassword(Request $request)
    {
        return $this->authService->ForgotPassword($request);
    }
    public function logout()
    {
        return $this->authService->logout();
    }
    public function redirectToGoogle()
    {
        return $this->authService->redirectToGoogle();
    }
    public function handleGoogleCallback()
    {
        return $this->authService->handleGoogleCallback();
    }
    public function redirectToFacebook()
    {
        return $this->authService->redirectToFacebook();
    }
    public function handleFacebookCallback()
    {
        return $this->authService->handleFacebookCallback();
    }
    public function redirectToBitbucket()
    {
        return $this->authService->redirectToBitbucket();
    }
    public function handleBitbucketCallback()
    {
        return $this->authService->handleBitbucketCallback();
    }
}
