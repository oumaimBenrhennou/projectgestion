<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=projeto;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>
<form >
    <div class="container-fluid">
        <div class="card bg-white" >
            <div class="card-header card-color">
                <p class="h2 text-center text-uppercase font-weight-bold pt-2">les classes des flières</p>
            </div>
            <div class="card-body container-fluid" >
                <div class="row">
                    <div class="col-sm-6 mb-2">
                        <label for='IdFilere'>ENTREZ L'ID DE LA FILIERE: </label>


                        <input class="form-control" type="text" id='codefil' name='codefil' required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" name="submit" value="Chercher" />
                    </div>
                </div>
                <div class="row table-responsive m-auto rounded">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-uppercase bg-light">
                                <th scope="col">Id</th>
                                <th scope="col">Code</th>

                                <th scope="col">IdFilere</th>
                            </tr>
                        </thead>

                        <tbody id="table-content">
                        <tbody>
<?php
if (isset($_GET["submit"])) {

    $codefil = $_GET['codefil'];
    $reponse = $bdd->query("SELECT * FROM classes where IdFiliere='$codefil'  ");
    while ($donnees = $reponse->fetch()) {  
        ?>
                                       <tr>
                                        <td><?php echo $donnees['id']; ?></td>
                                        <td><?php echo $donnees['code']; ?></td>
                                        <td><?php echo $donnees['IdFiliere']; ?></td>

                                    </tr>
    <?php }
}
?>

                        </tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>
