<?php

class Database
{

    /**
    * @var PDO Instance de PDO
    */
    private $pdo;

       
    /**
    * @return object
    * Instanciation de PDO
    */
    private function getPDO()
    {
        if($this->pdo === null){
            $pdo = new PDO(
                "mysql:dbname=location_vehicules;host=localhost" ,
                "root", 
                "",
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
            );

            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    /**
    * @param $requete string La requète SQL
    * @param $class_name string string Nom de la class utilisée (va remplacer la stdclass de php)
    * @return array
    * Execute une requète SQL
    */
    public function query($requete)
    {
        $pdo = $this->getPDO();
        $res = $pdo->query($requete);

        $res->setFetchMode(PDO::FETCH_OBJ);
        $data = $res->fetchAll();
       
       
        return $data;
    }

    /**
     * @param $requete string La requète SQL
     * @param $param array Liste des valeurs à remplacer dans requète 
     * @return array
     * Execute une requète pre SQL
     */
    public function prepare($requete, $param)
    {
        $pdo = $this->getPDO();
        $req = $pdo->prepare($requete);
        $req->setFetchMode(PDO::FETCH_OBJ);
        $bool = $req->execute($param);
        $data = $req->fetchAll();

        return $data;
    }

    /**
     * @param $requete string La requète SQL (SELECT ou UPDATE ou DELETE)
     * @param $param array Liste des valeurs à remplacer dans requète 
     * @return int
     * Execute une requète pre SQL
     */
    public function write($requete, $param)
    {
        $pdo = $this->getPDO();
        $req = $pdo->prepare($requete);
        $req->setFetchMode(PDO::FETCH_OBJ);
        return $req->execute($param); 
    }


}