<?php
require_once("../includes/init.inc.php"); 
require_once("../includes/head.inc.php");
require_once("../includes/navbar.inc.php");

if(!internauteEstConnecte()){
    header("location:../connexion.php");
    exit();
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
                        <div class="col-md-8">
                    <?php
                        $auteur = $_SESSION['membre']['nom'].' '.$_SESSION['membre']['prenom'];
                        $resultat = executeRequete("SELECT * FROM technologie;");
                        $exist_auteur = false;
                        while($technologie = $resultat->fetch_assoc()){
                            if(strpos($technologie['auteurs'], $auteur) !== false){
                                $exist_auteur = true;
                            ?>
                            <h5 class="card-header"><?= substr($technologie['designation'], 0, 40).' ...' ?></h5>
                            <?php
                            }
                        }
                    ?>
                    <?php
                        if($exist_auteur == false){
                            echo 'Vous n\'etes pas identifier comme auteur d\'une technologie';  
                        }
                    ?>

                        </div>
                        <div class="col-md-4">
                    <?php
                        $resultat = executeRequete("SELECT * FROM technologie;");
                        while ($technologie = $resultat->fetch_assoc()){
                            if(strpos($technologie['auteurs'], $auteur) !== false){
                            ?>
                                <div class="row d-flex justify-content-between py-1 mb-1">
                                    <a href="technologie-affichage-chercheur.php?action=<?= $technologie['id_techn'] ?>" class="btn btn-warning">Apercu</a>
                                </div>
                            <?php
                            }
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