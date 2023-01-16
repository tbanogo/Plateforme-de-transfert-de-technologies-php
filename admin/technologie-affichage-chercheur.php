<?php 
require_once("../includes/init.inc.php"); 
require_once("../includes/head.inc.php");
require_once("../includes/navbar.inc.php");

if(!internauteEstConnecte()){
    header("location:../connexion.php");
    exit();
}

if(!empty($_GET['action'])){
        $resultat = executeRequete("SELECT * FROM technologie where id_techn=$_GET[action];");
        $technologie = $resultat->fetch_assoc();
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
                <div class="container bg-dark h-50">
                    <ul class="navbar-nav py-2">
                        <li class="nav-item"><a class="nav-link text-light font-weight-bold text-uppercase px-3" href="publication-affichage.php">Publication</a></li>
                        <li class="nav-item"><a class="nav-link text-light font-weight-bold text-uppercase px-3" href="technologie-nouvelle.php">Nouvelle publication</a></li>
                        <li class="nav-item"><a class="nav-link text-light font-weight-bold text-uppercase px-3" href="technologie-participer.php">Projet participer</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-12">
                            <div class="container-fluid">
                                    <div class="d-flex justify-content-center border-bottom">
                                        <span class="border p-2 m-2">Détails</span>
                                    </div>
                                    <div class="card-title d-flex justify-content-center">
                                        <span class="border-bottom">Désignation</span>
                                    </div>
                                    <div class="card-text">
                                        <p><?= $technologie['designation'] ?></p>
                                    </div>
                                    <div class="card-title d-flex justify-content-center">
                                        <span class="border-bottom">Auteurs</span>
                                    </div>
                                    <div class="card-text">
                                        <p><?= $technologie['auteurs'] ?></p>
                                    </div>
                                    <div class="card-title d-flex justify-content-center">
                                        <span class="border-bottom">Culture(s) sur la(es)quelle(s) la technologie s'applique</span>
                                    </div>
                                    <div class="card-text">
                                        <p><?= $technologie['cultures'] ?></p>
                                    </div>
                                    <div class="card-title d-flex justify-content-center">
                                        <span class="border-bottom">Documents associés</span>
                                    </div>
                                    <div class="card-text">
                                        <p><a href="<?= $technologie['documents'] ?>" download>Telecharger ici</a></p>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="container">
                            <div id="map" style="height:300px;"></div>
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
