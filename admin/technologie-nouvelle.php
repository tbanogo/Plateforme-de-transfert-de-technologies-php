<?php 
require_once("../includes/init.inc.php"); 
require_once("../includes/head.inc.php");
require_once("../includes/navbar.inc.php"); 

if(!internauteEstConnecte()){
    header("location:../connexion.php");
    exit();
}

if(!empty($_POST)){
    $dir = $_FILES['document']['name'];
    $dir1 = RACINE_SITE . "photo/$dir";
    $document = ""; $continue = true;
    while($continue){
        $resultat = executeRequete("SELECT * FROM technologie where documents='$dir1';");
        if($resultat->num_rows != 0){ 
            $nom_photo = '1' .$dir;
            $dir1 = RACINE_SITE . "photo/$nom_photo";
            $continue = true;
            $dir = $nom_photo;
        }
        else
            $continue = false;
    }
    $document = $dir1;
    $photo_dossier = $_SERVER['DOCUMENT_ROOT'] . RACINE_SITE . "/photo/$dir";
    copy($_FILES['document']['tmp_name'],$photo_dossier);

    $_POST['designation'] = htmlEntities(addSlashes($_POST['designation']));

    $tableau_cultures = $_POST['cultures']; $culture = "";
    foreach($tableau_cultures as $selectValue1){
        $culture .= $selectValue1.', ';
    }
    $culture = substr($culture, 0, -2);

    $tableau_villes = $_POST['villes']; $villes = "";
    foreach($tableau_villes as $selectValue2){
        $villes .= $selectValue2.', ';
    }
    $villes = substr($villes, 0, -2);

    $tableau_auteurs = $_POST['auteurs_chercheur']; $auteurs = "";
    foreach($tableau_auteurs as $selectValue3){
        $auteurs .= $selectValue3.', ';
    }
    $auteurs = substr($auteurs, 0, -2);
    $auteur_total = $auteurs. ', '. $_POST['auteurs'];
    $auteur_total = htmlEntities(addSlashes($auteur_total));

    $data = date("d-m-Y").' '.date("H:i");
    $ses = $_SESSION['membre']['id_membre'];
    executeRequete("INSERT INTO technologie (designation, auteurs, cultures, documents, villes, date_enre, date_publication, publicateur) values ('$_POST[designation]', '$auteur_total', '$culture', '$document', '$villes', '$data', '$_POST[date_mis]', '$ses')");
    header("location:publication-affichage.php?action=affichage");
}

?>

    <br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 border">
                <div class="card-title d-flex justify-content-center">
                    <span class="border-bottom">Tableau de bord</span>
                </div>
                <div class="container-fluid">
                    <div class="card mb-2 p-3" style="width: 100%;">
                        <img class="card-img-top img-thumbnail rounded-circle mx-auto" src="../img/avatar.webp" alt="" style="width: 250px; height:250px;">
                    </div>
                    <div class="card-title d-flex justify-content-center">
                        <span class="border-bottom"><?= $_SESSION['membre']['pseudo']; ?></span>
                    </div>
                </div>
                <div class="container bg-dark h-25">
                    <ul class="navbar-nav py-2">
                        <li class="nav-item"><a class="nav-link text-light font-weight-bold text-uppercase px-3" href="publication-affichage.php">Publication</a></li>
                        <li class="nav-item"><a class="nav-link text-light font-weight-bold text-uppercase px-3" href="technologie-nouvelle.php">Nouvelle publication</a></li>
                        <li class="nav-item"><a class="nav-link text-light font-weight-bold text-uppercase px-3" href="technologie-participer.php">Projet participer</a></li>
                    </ul>
                </div>
            </div>
            <form class="col-md-8" method="post" action="" enctype="multipart/form-data">
                <div class="border-top mx-auto" style="width: 50%;"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group my-5">
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input id="designation" name="designation" class="form-control" placeholder="Designation de la technologie" type="text" required="required">
                                </div>
                            </div>
                            <div class="form-group my-5">
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input type="file" id="document" name="document" class="form-control" required="required" accept="audio/*,video/*,.pdf" required="required" multiple>
                                    <!--<div class="custom-file form-control form-control-lg">
                                        <input type="file" class="custom-file-input" id="document" name="document" accept="audio/*,video/*,.pdf" multiple>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>-->
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group my-5">
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <select class="selectpicker show-menu-arrow form-control form-control-lg" data-width="auto" id="cultures" name="cultures[]" multiple>
                                        <option>Mustard</option>
                                        <option>Ketchup</option>
                                        <option>Relish</option>
                                    </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="cultures">Cultures</label>
                                    </div>
                                    <!-- <input id="cultures" name="cultures" class="form-control" placeholder="Cultures sur la quelle elle s'applique" type="text" required="required"> -->
                                </div>
                            </div>
                            <div class="form-group my-5">
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <select class="selectpicker show-menu-arrow form-control form-control-lg" data-width="auto" id="villes" name="villes[]" multiple>
                                        <option>Ouagadougou</option>
                                        <option>Bobo Dioulasso</option>
                                        <option>Banfora</option>
                                        <option>Koudougou</option>
                                    </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="villes">Villes</label>
                                    </div>
                                    <!--<input name="villes" id="villes" class="form-control" placeholder="Villes favorables à la culture" type="text" required="required">-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input type="date" placeholder="Date de mise en oeuvre" name="date_mis" id="date_mis" class="form-control" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="auteurs" id="auteurs" class="form-control w-25" placeholder="Auteur non chercheur" type="text" required="required">
                                    <select class="selectpicker show-menu-arrow form-control form-control-lg w-50" data-width="auto" id="auteurs_chercheur" name="auteurs_chercheur[]" multiple>
                                        
                                        <?php 
                                            $resultat = executeRequete("SELECT * FROM membre;");
                                            while ($membre = $resultat->fetch_assoc()){
                                            ?>
                                                <option><?= $membre['nom']. ' ' . $membre['prenom'] ?></option>
                                                <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mx-auto">
                            <div class="input-group">
                            <button type="submit" class="btn btn-primary" style="width: 200px;" btn-block>Publier</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php 
include '../includes/link.inc.php';
//include '../includes/footer.inc.php'; 
?>