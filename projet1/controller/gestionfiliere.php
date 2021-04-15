<?php

chdir('..');
include_once 'services/filiereService.php';
extract($_POST);

$ds = new filiereService();

if ($op != '') {
    if ($op == 'add') {
        $ds->create(new filiere(0, $code, $libelle));
    } elseif ($op == 'update') {
        $ds->update(new filiere($id, $code, $libelle));
    } elseif ($op == 'delete') {
        $ds->delete($ds->findById($id));
    }
}

header('Content-type: application/json');
echo json_encode($ds->findAll());
