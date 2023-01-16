<?php require_once("includes/init.inc.php");

require_once("includes/head.inc.php");
require_once("includes/navbar.inc.php");

if(internauteEstConnecte()){
    header("location:admin/publication-affichage.php?action=affichage");
}

if($_POST){
    $resultat = executeRequete("SELECT * FROM membre WHERE identifiant='$_POST[identifiant]'");
    if($resultat->num_rows > 0){
        $membre = $resultat->fetch_assoc();
        $contenu .= '<div class="text-success text-center">Votre mot de passe est : '.$membre['mdp'].'</div>';
    }else{
        $contenu .= '<div class="erreur">Erreur d\'identifiant</div>';
    }
}
?>

<br><br><br>
<div class="container-fluid">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <aside class="col-sm-12 col-md-8 col-lg-4 ">
            <div class="card">
                <article class="card-body">
	                <h4 class="card-title text-center mb-4 mt-1">Récuperation du compte</h4>
	                <hr>
                    <p class="text-success text-center"><?= $contenu ?></p>
	                <form method="post" action="">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input id="identifiant" name="identifiant" class="form-control" placeholder="Identifiant" type="text">
                            </div>
                        </div>
	                    <div class="form-group">
	                        <button type="submit" class="btn btn-primary btn-block"> Récuperation  </button>
	                    </div>
	                </form>
                </article>
            </div> 
        </aside> 
    </div> 
</div>

<?php include 'includes/link.inc.php'; ?>