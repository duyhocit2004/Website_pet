<?php 

namespace App\Service\Client;

use App\Repository\ClientRepository;
use App\Repository\ProductRepository;
class ClientService{

    public $ClientRepository;
    public function __construct(ClientRepository $ClientRepository){
        $this->ClientRepository = $ClientRepository;
    }
    public function DetailProductClient($id){
        return $this->ClientRepository->DetailProductClient($id);
    }
    public function comment(){

    }
    public function cart(){

    }
    public function order(){

    }
}