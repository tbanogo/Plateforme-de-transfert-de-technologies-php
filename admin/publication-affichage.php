<?php
require_once("../includes/init.inc.php"); 
require_once("../includes/head.inc.php");
require_once("../includes/navbar.inc.php");

if(!internauteEstConnecte()){
    header("location:../connexion.php");
    exit();
}

//--- SUPPRESSION PRODUIT ---//
if(isset($_GET['action']) && $_GET['action'] == "suppression"){
    $resultat = executeRequete("SELECT * FROM technologie WHERE id_techn=$_GET[id_techn]");
    $technologie_a_supprimer = $resultat->fetch_assoc();
    $chemin_document_a_supprimer = $_SERVER['DOCUMENT_ROOT'] . $technologie_a_supprimer['documents'];
    if(!empty($technologie_a_supprimer['documents']) && file_exists($chemin_document_a_supprimer)) unlink($chemin_document_a_supprimer);
    executeRequete("DELETE FROM technologie WHERE id_techn=$_GET[id_techn]");
    $contenu .= '<div class="validation">Suppression de la technolgie : ' . $_GET['id_techn'] . '</div>';
    $_GET['action'] = 'affichage';
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
            <div class="col-md-8">
                <div class="border-top mx-auto" style="width: 50%;"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-7 col-md-5 col-sm-4 col-xs-4">
                    <?php
                        $publicateur_id = $_SESSION['membre']['id_membre'];
                        $resultat = executeRequete("SELECT * FROM technologie WHERE publicateur='$publicateur_id';");
                        if($resultat->num_rows != 0){
                            while ($technologie = $resultat->fetch_assoc()){
                                ?>
                                <h5 class="card-header"><?= substr($technologie['designation'], 0, 10).' ...' ?></h5>
                                <?php
                            }
                        }else{
                            echo "Vous n'avez pas encore publier une technlogie";  
                        }
                    ?>

                        </div>
                        <div class="col-lg-5 col-md-7 col-sm-8 col-xs-8">
                    <?php
                        $resultat = executeRequete("SELECT * FROM technologie WHERE publicateur='$publicateur_id';");
                        while ($technologie = $resultat->fetch_assoc()){
                            ?>
                                <div class="row  py-1 mb-1">
                                    <a href="technologie-affichage-chercheur.php?action=<?= $technologie['id_techn'] ?>" class="btn btn-warning d-inline mr-auto">Apercu</a>
                                    <a href="technologie-creation-modif.php?action=<?= $technologie['id_techn']; ?>" class="btn btn-primary d-inline mr-auto">Modifier</a>
                                    <a href="?action=suppression&id_techn=<?= $technologie['id_techn']; ?>" class="btn btn-danger d-inline mr-auto">Supprimer</a>
                                </div>
                            <?php
                        }
                    ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include '../includes/link.inc.php'; 
//include '../includes/footer.inc.php'; 
?>