<?php

class Admin  
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function login()
    {
       $errors =[];
       $app = new App();

       extract($_POST);

       if ($app->formIsEmpty(['identifiant','mot_de_passe'])) {
           $errors[] = "Completez tous les champs";
       }
       elseif (!$this->exists($identifiant, $mot_de_passe)) {
           $errors[] = "Erreur d'identifiants";      
       }
       else {
            $admin = $this->adminInfo($identifiant, $mot_de_passe);
            $_SESSION['admin'] = $admin->id;
            $_SESSION['nom'] = $admin->nom;

            header('Location:car.list.php');
            exit();
       }

       return $errors;
    }

    private function adminInfo($username, $password)
    {
        $result = $this->db->prepare(
            "SELECT * FROM t_admin
             WHERE pseudo = :pseudo
                AND mot_de_passe = :pseudo",
            [
                'pseudo' => $username,
                'pseudo' => $password
            ]
        );

        return $result[0];
    }

    //A factoriser
    private function exists($username, $password)
    {
        $result = $this->db->prepare(
            "SELECT * FROM t_admin
             WHERE pseudo = :pseudo
                AND mot_de_passe = :password",
            [
                'pseudo' => $username,
                'password' => $password
            ]
        );

       return (count($result) > 0) ? true : false ;
    }

}
