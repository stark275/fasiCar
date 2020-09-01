<?php

class Location 
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function byPeriod()
    {
        $app = new App();
        extract($_POST);
        return $this->db->prepare("
            SELECT * FROM t_locations
            WHERE debut >= :debut AND
                  fin <= :fin",
        [
            'debut' => $app->dateFormate($debut),
            'fin' => $app->dateFormate($fin)
        ]);
    }

    public function checkPeriod()
    {
       $errors =[];
       $app = new App();

       extract($_POST);

       if ($app->formIsEmpty(['debut','fin'])) {
           $errors[] = "Completez tous les champs";
       }
       elseif (!$app->periodIsvalid($debut, $fin)) {
           $errors[] = "Periode invalide";      
       }
       return $errors;
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

    public function filter()
    {
        
    }
}
