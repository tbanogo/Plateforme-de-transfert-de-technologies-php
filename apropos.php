
<?php require_once("includes/init.inc.php");

if(isset($_GET['action']) && $_GET['action'] == "deconnexion"){
    unset($_SESSION['membre']);
}

if(internauteEstConnecte()){
    header("location:admin/publication-affichage.php?action=affichage");
}

require_once("includes/head.inc.php");
require_once("includes/navbar.inc.php");
require_once("includes/banner.inc.php");

?>

<div class="container text-center text-md-left mt-5">
        <div class="row mt-3">
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold">Concepteurs</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>Banogo Serge</p>
                <p>Baga Assami</p>
                <p>Convolbo Ousmane</p>
                <p>Ky Felicité</p>
                <p>Savadogo Bassirou</p>
            </div>
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <h6 class="text-uppercase font-weight-bold">Contact</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p><i class="fas fa-home mr-3"></i>info@example.com</p>
                <p><i class="fas fa-envelope mr-3"></i>info@example.com</p>
                <p><i class="fas fa-phone mr-3"></i>info@example.com</p>
                <p><i class="fas fa-print mr-3"></i>info@example.com</p>
                <p><i class="fas fa-print mr-3"></i>info@example.com</p>
            </div>
        </div>
    </div>


<?php 
include 'includes/link.inc.php';
include 'includes/footer.inc.php'; 
?>