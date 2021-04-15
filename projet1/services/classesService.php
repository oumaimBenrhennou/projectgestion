<?php

include_once 'beans/classes.php';
include_once 'connexion/Connexion.php';
include_once 'dao/IDao.php';
class classesService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }


    public function create($o) {
        $query = "INSERT INTO classes VALUES (NULL,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getCode(),$o->getIdFiliere() )) or die('Error');

    }

    public function delete($id) {
        $query = "DELETE FROM classes WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

     public function findAll() {
        $query = "select c.* , f.code as 'codef' from Classes c inner join filiere f on f.id=c.IdFiliere";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        $c = $req->fetchAll(PDO::FETCH_OBJ);
        return $c;
    }


    public function findById($id) {
        $query = "select * from classes where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res=$req->fetch(PDO::FETCH_OBJ);
        $classes = new classes($res->id,$res->code, $res->IdFiliere);
        return $classes;
    }
    
    public function countByFiliere(){
        $query = "select count(*)as nbr,filiere.code as fil from classes inner join filiere on classes.IdFiliere=filiere.id GROUP BY fil";
        $req = $this->connexion->getConnexion()->query($query);
        $req->execute();
        $e= $req->fetchAll(PDO::FETCH_OBJ);
        return $e;
    }

     public function findfiliere() {
        $fils = array();
        $query = "select code from filiere";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($f = $req->fetch(PDO::FETCH_OBJ)) {
            $fils[] = new Filiere($f->id, $f->code, $f->libelle);
        }
        return $fils;
    }

    public function update($o) {
        $query = "UPDATE classes SET IdFiliere = ?,code=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getIdFiliere(),$o->getCode(), $o->getId())) or die('Error');
    }

}
