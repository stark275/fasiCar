<?php

class App 
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function listCars()
    {
        // echo '<pre>';
        // var_dump($this->db->query("SELECT * FROM si_teachers"));
        // echo '</pre>';

    }
  
}
