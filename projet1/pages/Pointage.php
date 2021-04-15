<?php
if(session_status() != PHP_SESSION_ACTIVE) {
    session_start();
    }
  if(isset($_SESSION['employe'])){

 ?>
<div class="container-fluid">
    <div class="card bg-white" >
        <div class="card-header card-color">
            <p class="h2 text-center text-uppercase font-weight-bold pt-2">Gestion des pointages</p>
        </div>
        <div class="card-body container-fluid" >
            <div class="row">
                <div class="col-sm-6 mb-4">
                    <label for="employe">Employe : </label>
                    <select id="employe" class="custom-select" ></select>
                </div>
                <div class="col-sm-6 mb-4">
                    <label for="etat">Etat : </label>
                    <select id="etat" class="custom-select" >
                        <option>Choisi une etat</option>
                        <option>Entrer</option>
                        <option>Sortie</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-4">
                    <label for="date">Date : </label>
                    <input class="form-control" type="datetime-local" id="date" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-outline-success mt-3 mb-3" id="btn">Ajouter</button>
                </div>
            </div>
            <div class="row table-responsive m-auto rounded">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-uppercase bg-light">
                            <th scope="col">Id</th>
                            <th scope="col">Date</th>
                            <th scope="col">Etat</th>
                            <th scope="col">Employe</th>
                            <th scope="col">Supprimer</th>
                            <th scope="col">Modifier</th>
                        </tr>
                    </thead>
                    <tbody id="table-content">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="script/pointage.js" type="text/javascript"></script>
<?php

}else{
  header("Location: ../index.php");
}
 ?>
