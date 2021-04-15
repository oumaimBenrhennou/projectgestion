<?php


class Fonction {
    private $id;
    private $code;
    private $nom;
    
    function __construct($id, $code, $nom) {
        $this->id = $id;
        $this->code = $code;
        $this->nom = $nom;
    }
    
    function getId() {
        return $this->id;
    }

    function getCode() {
        return $this->code;
    }

    function getNom() {
        return $this->nom;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCode($code) {
        $this->code = $code;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }



}
