<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employe
 *
 * @author mosab
 */
class Employe {

    private $cin;
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $adresse;
    private $password;
    private $role;
    private $photo;
    private $fonction;
    private $departement;
    
    function __construct($cin, $nom, $prenom, $email, $telephone, $adresse, $password, $role, $photo, $fonction, $departement) {
        $this->cin = $cin;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->adresse = $adresse;
        $this->password = $password;
        $this->role = $role;
        $this->photo = $photo;
        $this->fonction = $fonction;
        $this->departement = $departement;
    }
    
    function getCin() {
        return $this->cin;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelephone() {
        return $this->telephone;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getPassword() {
        return $this->password;
    }

    function getRole() {
        return $this->role;
    }

    function getPhoto() {
        return $this->photo;
    }

    function getFonction() {
        return $this->fonction;
    }

    function getDepartement() {
        return $this->departement;
    }

    function setCin($cin) {
        $this->cin = $cin;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRole($role) {
        $this->role = $role;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }

    function setFonction($fonction) {
        $this->fonction = $fonction;
    }

    function setDepartement($departement) {
        $this->departement = $departement;
    }



    
}
