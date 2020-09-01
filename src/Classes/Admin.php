<?php

class Admin  
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Connecte l'admin
     * @return array
     * Execute une requète pre SQL
     */
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

    /**
     * Recupere les infos de l'admin 
     * @param $username string
     * @param $password string  
     * @return array
     * Execute une requète pre SQL
     */
    private function adminInfo($username, $password)
    {
        $result = $this->db->prepare(
            "SELECT * FROM t_admin
             WHERE pseudo = :pseudo
                AND password = :password",
            [
                'pseudo' => $username,
                'password' => $password
            ]
        );

        return $result[0];
    }

    /**
     * Verifie si un administrateur existe 
     * @return bool
     * Execute une requète pre SQL
     */
    private function exists($username, $password)
    {
        $result = $this->db->prepare(
            "SELECT * FROM t_admin
             WHERE pseudo = :pseudo
                AND password = :password",
            [
                'pseudo' => $username,
                'password' => $password
            ]
        );

       return (count($result) > 0) ? true : false ;
    }

}
