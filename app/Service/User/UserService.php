<?php

namespace App\Service\User;
use App\Repository\User\UserRepository;
use Illuminate\Support\Facades\Request;

class UserService implements IUserService{
    public $UserRepository;
    public function __construct(UserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }
    
    public function GetUserAndAdmin()
    {
        return $this->UserRepository->GetUserAndAdmin();
    }
    
}