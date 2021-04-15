<?php

chdir('..');
include_once 'services/EmployeService.php';
extract($_POST);

$es = new EmployeService();
$r = true;

if ($op != '') {
    if ($op == 'add') {
        $es->create(new Employe($cin, $nom, $prenom, $email, $telephone, $adresse, md5($password), $role, $photo, $fonction, $departement));
    } elseif ($op == 'update') {
        $_password = $es->findById($cin)->getPassword();
        if($password==""){
            $password = $_password;
        }else{
            $password = md5($password);
        }
        $es->update(new Employe($cin, $nom, $prenom, $email, $telephone, $adresse, $password, $role, $photo, $fonction, $departement));
    } elseif ($op == 'delete') {
        $es->delete($es->delete($cin));
    } elseif ($op == 'find') {
        header('Content-type: application/json');
        echo json_encode($es->findById($cin));
        $r = false;
    }
}
if ($r == true){
    header('Content-type: application/json');
    echo json_encode($es->findAll());
}

