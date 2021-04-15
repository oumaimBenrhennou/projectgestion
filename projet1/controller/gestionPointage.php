<?php

chdir('..');
include_once 'services/PointageService.php';
extract($_POST);

$ps = new PointageService();
$r = true;

if ($op != '') {
    if ($op == 'add') {
        $ps->create(new Pointage(0, $date, $etat, $employe));
    } elseif ($op == 'update') {
        $ps->update(new Pointage($id, $date, $etat, $employe));
    } elseif ($op == 'delete') {
        $ps->delete($ps->delete($id));
    } elseif ($op == 'find') {
        header('Content-type: application/json');
        echo json_encode($ps->findById($id));
        $r = false;
    }elseif($op=='historique'){
        header('Content-type: application/json');
        echo json_encode($ps->historique($cin,$dated,$datef));
        $r = false;
    }
}
if ($r == true){
    header('Content-type: application/json');
    echo json_encode($ps->findAll());
}