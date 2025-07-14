<?php 

 namespace App\Service\Client;

 interface IClientService {
    public function DetailProductClient($id);
    public function comment();
    public function cart();
    public function order();
 }