<?php 

namespace App\Service\User;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Request;


interface IUserService
{
    public function GetUserAndAdmin();
    

}