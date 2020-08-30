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
        $this->db->prepare(
            "SELECT * FROM t_clients 
            WHERE pseudo = :pseudo AND password = :password",
            ['pseudo' => $username, 'password' => $password] );
    }

    public function rent($carId)
    {
        echo '<pre>';
         var_dump(


             $this->db->prepare(
                "SELECT * FROM si_teachers WHERE id = :id",
                ['id' => 1]
            ));

            
        echo '</pre>';
    }

    
}
