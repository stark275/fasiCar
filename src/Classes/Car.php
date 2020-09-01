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
     /**
     * Details d'un vehicule
     * @return array
     */
    public function details($id)
    {
        return  $this->db->prepare(
            "SELECT * FROM t_voitures
             WHERE id = :id",
             ['id' => $id]
        );
    }

    /**
     * Supprime un vehicule
     * @return array
     */
    public function delete($id)
    {
        return  $this->db->write(
            "DELETE FROM t_voitures
             WHERE id = :id",
             ['id' => $id]
        );
    }

      /**
     * Met a jour les infos d'un vehicule
     * @return array
     */
    public function update($id)
    {
       $errors =[];
       $app = new App();

       extract($_POST);

       if ($app->formIsEmpty(['categorie','marque','model'])) {
           $errors[] = "Completez tous les champs";
       }
       else {
          $this->db->write(
            "UPDATE t_voitures
             SET categorie = :categorie,
                 marque = :marque,
                 model = :model
            WHERE id = :id",

            [
                'categorie' => $categorie,
                'marque' => $marque,
                'model' => $model,
                'id' => $id
            ]
         );
        }

       return $errors;
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
               "INSERT INTO t_voitures (categorie,marque,model,imatriculation)
                VALUES (:categorie,:marque,:model,:imatriculation)",
                [
                    'categorie' => $categorie,
                    'marque' => $marque,
                    'model' => $model,
                    'imatriculation' => $immatr
                ]
            );
       }

       return $errors;
    }
    
    /**
     * Verifie si une immatriculation existe en bdd
     * @param $immatr string  
     * @return bool
     */
    private function carExists($immatr)
    {
       $result = $this->db->prepare(
            "SELECT * FROM t_voitures
             WHERE imatriculation = :imatriculation",
            [
                'imatriculation' => $immatr
            ]
        );

       return (count($result) > 0) ? true : false ;
    }

    
}
