<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of filiereService
 *
 * @author mosab
 */
include_once 'beans/filiere.php';
include_once 'connexion/Connexion.php';
include_once 'dao/IDao.php';

class filiereService implements IDao {
    //put your code here
    private $connexion;
    
    function __construct() {
        $this->connexion = new Connexion();
    }

    
    public function create($o) {
        $query = "INSERT INTO filiere VALUES (NULL,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getCode(),$o->getLibelle() )) or die('Error');
    
    }

    public function delete($o){
        $query = "DELETE FROM filiere WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute($o->getId()) or die("erreur SQL");
    }

    public function findAll() {
        $query = "select * from filiere";
        $req = $this->connexion->getConnexion()->query($query);
        $f= $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    

    public function findById($id) {
        $query = "select * from filiere where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));  
        $res=$req->fetch(PDO::FETCH_OBJ);
        $fonction = new filiere($res->id,$res->code, $res->libelle);
        return $fonction;
    }
    
    public function countByFiliere(){
        $query = 'select count(*)as nbr,filiere.code as fil from classes inner join filiere on classes.idFiliere=filiere.id GROUP BY fil';
        $req = $this->connexion->getConnexion()->prepare($query);
        $e = $req->fetch(PDO::FETCH_OBJ);
        return $e;
    }

     public function findByIdApi($id) {
        $query = "select * from filiere where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));  
        $res=$req->fetch(PDO::FETCH_OBJ);
        return $res;
    }

    public function update($o) {
        $query = "UPDATE filiere SET libelle = ?,code=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getLibelle(),$o->getCode(), $o->getId())) or die('Error');       
    }

}
