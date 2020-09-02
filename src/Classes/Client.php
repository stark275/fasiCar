<?php

class Client  
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function login($mail, $password)
    {
        return $this->db->prepare(
            "SELECT * FROM t_clients 
            WHERE email = :mail AND password = :password AND etat=1",
            ['mail' => $mail, 'password' => $password] );
         /**
     * Details d'un vehicule
     * @return array
     */
        
    }

   

    
}
