<?php 

namespace App\Service\Auth;

use Auth;
use App\Repository\AuthRepository;
use Illuminate\Support\Facades\Request;

class AuthService implements IAuthService{

    public $AuthRepository;
    public function __construct(AuthRepository $AuthRepository)
    {
        $this->AuthRepository = $AuthRepository;
    }

    public function login($data)
    {
        $data->validate([
           
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ],[
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',

            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
          
        ]);
        return $this->AuthRepository->login($data);
        
    }

    public function loginAdmin($data)
    {
         $data->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ],[
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
          
        ]);
        // dd($data->all());
        return $this->AuthRepository->loginAdmin($data);
    }

    public function register($data)
    {
       $data->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ],[
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
          
        ]);
        $this->AuthRepository->register($data);
    }

    public function logout()
    {
       return $this->AuthRepository->logout();
    }

    public function ForgotPassword($request){
        $request->validate([
            'email' => 'required|string|email|max:255',
        ],[
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
        ]);
        return $this->AuthRepository->ForgotPassword($request);
    }
    public function redirectToGoogle()
    {
        return $this->AuthRepository->redirectToGoogle();
    }
    public function handleGoogleCallback()
    {
        return $this->AuthRepository->handleGoogleCallback();
    }
    public function redirectToFacebook()
    {
        return $this->AuthRepository->redirectToFacebook();
    }
    public function handleFacebookCallback()
    {
        return $this->AuthRepository->handleFacebookCallback();
    }
    public function redirectToBitbucket()
    {
        return $this->AuthRepository->redirectToBitbucket();
    }
    public function handleBitbucketCallback()
    {
        return $this->AuthRepository->handleBitbucketCallback();
    }
}