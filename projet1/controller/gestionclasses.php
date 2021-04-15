<?php

chdir('..');
include_once 'services/classesService.php';
extract($_POST);

$fs = new classesService();
$r = True;

if ($op != '') {
    if ($op == 'add') {
        $fs->create(new classes(0, $code, $filiere));
    } elseif ($op == 'update') {
        $fs->update(new classes($id, $code, $filiere));
    } elseif ($op == 'delete') {
        $fs->delete($id);
    } elseif ($op == 'countFiliere') {
        header('Content-type: application/json');
        echo json_encode($fs->countByFiliere());
        $r = false;
    }
}
if ($r){
   
header('Content-type: application/json');
echo json_encode($fs->findAll());}

