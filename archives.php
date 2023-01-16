
<?php require_once("includes/init.inc.php");

if(internauteEstConnecte()){
    header("location:admin/publication-affichage.php?action=affichage");
}

require_once("includes/head.inc.php");
require_once("includes/navbar.inc.php");
require_once("includes/banner.inc.php");

?>

<div class="container-fluid">
        <div class="row mb-4">
            <div class="col text-center">
                <h1 class="text-warning display-3 fw-bold">Actualités</h1>
                <p class="lead text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates voluptas, doloribus officiis ipsam temporibus molestiae aperiam!</p>
            </div>
        </div>

        <div class="row">
        <?php
            $resultat = executeRequete("SELECT * FROM technologie;");
            while ($technologie = $resultat->fetch_assoc()){
                if($technologie['date_enre'] < '06-02-2022 01:11'){
                $resultat1 = executeRequete("SELECT * FROM membre WHERE id_membre='$technologie[publicateur]';");
                $membre = $resultat1->fetch_assoc();
                ?>
                <div class="col-lg-3 col-sm-10 mb-5 col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text"><?= substr($technologie['designation'], 0, 20).' ...' ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="detail.php?action=<?= $technologie['id_techn'] ?>" class="btn btn-primary">Lire plus</a>
                                <small class="text-muted"><?= $technologie['date_enre'] ?></small>
                            </div>
                        </div>
                        <div class="card-footer">
                            Publie par <?= $membre['pseudo'] ?>
                        </div>
                    </div>
                </div>
                <?php
                }
            }
        ?>
        </div>
    </div>

<?php 
include 'includes/link.inc.php';
include 'includes/footer.inc.php'; 
?>