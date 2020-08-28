<?php

class Client  
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function login($username, $password)
    {
        #logique
    }

    public function rent($carId)
    {
        # code...
    }

    
}
