<?php

class Location 
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Recupere les locations d'une periode donnée
     * @return array
     * Execute une requète pre SQL
     */
    public function byPeriod()
    {
        $app = new App();
        extract($_POST);
        return $this->db->prepare("
            SELECT 
                l.*, 
                c.nom,
                v.categorie,
                v.marque,
                v.model,
                v.imatriculation
            FROM t_locations l
            JOIN t_clients c
                ON l.client = c.id
            JOIN t_voitures v
                ON l.voiture = v.id
            WHERE debut >= :debut AND
                  fin <= :fin",
        [
            'debut' => $app->dateFormate($debut),
            'fin' => $app->dateFormate($fin)
        ]);
    }

    /**
     * Verifie si la periode selectionée est valide
     * @return array
     * Execute une requète pre SQL
     */
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

    /**
     * Recupere les locations
     * @return array
     * Execute une requète pre SQL
     */
    public function list()
    {
      return $this->db->query("
        SELECT 
            l.*, 
            c.nom,
            v.categorie,
            v.marque,
            v.model,
            v.imatriculation
        FROM t_locations l
        JOIN t_clients c
            ON l.client = c.id
        JOIN t_voitures v
            ON l.voiture = v.id
      ");
    } 

    public function filter()
    {
        
    }
}
