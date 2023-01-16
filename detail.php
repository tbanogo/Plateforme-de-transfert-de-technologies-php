<?php 
require_once("includes/init.inc.php");
require_once("includes/head.inc.php");
require_once("includes/navbar.inc.php");
require_once("includes/banner.inc.php");

if(internauteEstConnecte()){
    header("location:admin/publication-affichage.php?action=affichage");
}

if(!empty($_GET['action'])){
    $resultat = executeRequete("SELECT * FROM technologie where id_techn=$_GET[action];");
    $technologie = $resultat->fetch_assoc();
    
    $resultat1 = executeRequete("SELECT * FROM membre WHERE id_membre='$technologie[publicateur]';");
    $membre = $resultat1->fetch_assoc();
}
?>

    <br><br><br>
    <div class="container-fluid">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-4 border-right">
                         <br>
                        <div class="container-fluid mt-4">
                            <!-- <div class="card mb-2 p-3" style="width: 100%;">
                                <img class="card-img-top img-thumbnail rounded-circle mx-auto" src="img/avatar.webp" alt="" style="width: 250px; height:250px;">
                            </div> -->
                            <span class="d-flex justify-content-center">Publie le <?= $technologie['date_enre'] ?></span>
                            <span class="d-flex justify-content-center">Par <?= $membre['pseudo'] ?> : <?= $membre['email'] ?></span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="container-fluid">
                                <!-- <div class="d-flex justify-content-center border-bottom">
                                    <span class="border p-2 m-2">Details</span>
                                </div> -->
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
                                    <span class="border-bottom">Culture applicable</span>
                                </div>
                                <div class="card-text">
                                    <p><?= $technologie['cultures'] ?></p>
                                </div>
                                <div class="card-title d-flex justify-content-center">
                                    <span class="border-bottom">Documents associés</span>
                                </div>
                                <div class="card-text">
                                    <p><a href="<?= $technologie['documents'] ?>">Telecharger ici</a></p>
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

<?php 
include 'includes/link.inc.php';
include 'includes/footer.inc.php'; 
?>