<?php

class Car 
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function list()
    {
        return $this->db->query("SELECT * FROM t_voitures");
    }

    public function delete($id)
    {
        #logique
    }

      /**
     * Met a jour les infos d'un vehicule
     * @return array
     */
    public function update($id)
    {
        # code...
    }

     /**
     * Cree une nouvelle voiture
     * @return array
     */
    public function create()
    {
       $errors =[];
       $app = new App();

       extract($_POST);

       if ($app->formIsEmpty(['categorie','marque','model','immatr'])) {
           $errors[] = "Completez tous les champs";
       }
       elseif ($this->carExists($immatr)) {
           $errors[] = "Le matricule existe deja";      
       }
       else {
           $this->db->write(
               "INSERT INTO t_voitures (categorie,marque,model,immatr)
                VALUES (:categorie,:marque,:model,:immatr)",
                [
                    'categorie' => $categorie,
                    'marque' => $marque,
                    'model' => $model,
                    'immatr' => $immatr
                ]
            );
       }

       return $errors;
    }
    
    /**
     * Verifie si une immatriculation existe en bdd
     * @param $immatr string  
     * @return array
     */
    private function carExists($immatr)
    {
       $result = $this->db->prepare(
            "SELECT * FROM t_voitures
             WHERE immatr = :immatr",
            [
                'immatr' => $immatr
            ]
        );

       return (count($result) > 0) ? true : false ;
    }

    
}
