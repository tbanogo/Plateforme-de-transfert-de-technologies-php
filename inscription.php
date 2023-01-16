<?php 
require_once("includes/init.inc.php");
require_once("includes/head.inc.php");
require_once("includes/navbar.inc.php");

if(internauteEstConnecte()){
    header("location:admin/publication-affichage.php?action=affichage");
}

if($_POST){
    $resultat = executeRequete("SELECT * FROM identifiants WHERE identifiant='$_POST[identifiant]'");
    //$resultat_membre = executeRequete("SELECT * FROM identifiants WHERE identifiant='$_POST[identifiant]'");
    if($resultat->num_rows > 0){
        /*foreach($_POST as $indice => $valeur){
            $_POST[$indice] = htmlEntities(addSlashes($valeur));
        }*/
        executeRequete("INSERT INTO membre (identifiant,pseudo, nom, prenom, mdp, email) VALUES ('$_POST[identifiant]', '$_POST[pseudo]', '$_POST[nom]', '$_POST[prenom]', '$_POST[mdp]', '$_POST[email]')");
        $resultat = executeRequete("SELECT * FROM membre WHERE pseudo='$_POST[pseudo]'");
        $membre = $resultat->fetch_assoc();
        foreach($membre as $indice => $element){
            if($indice != 'identifiant' && $indice != 'mdp'){
                $_SESSION['membre'][$indice] = $element;
            }
        }
        header("location:admin/publication-affichage.php?action=affichage");
    }
    else{
        $contenu .= "<div class='erreur'>Identifiant invalide.</div>";
    }
}
?>

<br><br><br>
<div class="container-fluid my-auto">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <aside class="col-sm-12 col-md-8 col-lg-4">
            <div class="card">
                <article class="card-body">
	                <h4 class="card-title text-center mb-4 mt-1">Inscription sur la plateforme</h4>
	                <hr>
	                <p class="text-success text-center"><?= $contenu ?></p>
	                <form method="post" action="">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fas fa-id-card"></i> </span>
                                </div>
                                <input name="identifiant" class="form-control" placeholder="Identifiant" type="text" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input id="nom" name="nom" class="form-control" placeholder="Nom" type="text" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input id="prenom" name="prenom" class="form-control" placeholder="Prénom" type="text" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input id="pseudo" name="pseudo" class="form-control" placeholder="Pseudo" type="pseudo" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fas fa-at"></i> </span>
                                </div>
                                <input id="email" name="email" class="form-control" placeholder="Email" type="email">
                            </div>
                        </div>
	                    <div class="form-group">
	                        <div class="input-group">
		                        <div class="input-group-prepend">
		                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		                        </div>
	                            <input class="form-control" id="mdp" name="mdp" placeholder="********" type="password" required="required">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <button type="submit" class="btn btn-primary btn-block"> Submit  </button>
	                    </div>
	                </form>
                </article>
            </div>
        </aside>
    </div>
</div>
<?php include 'includes/link.inc.php'; ?>