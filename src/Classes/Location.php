<?php

class Location 
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function list()
    {
      return $this->db->query("
        SELECT 
            l.*, 
            c.nom,
            v.categorie,
            v.marque,
            v.model,
            v.immatr
        FROM t_locations l
        JOIN t_clients c
            ON l.client_id = c.id
        JOIN t_voitures v
            ON l.voiture_id = v.id
      ");
    } 
}
