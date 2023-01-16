<?php require_once("includes/init.inc.php");

if(isset($_GET['action']) && $_GET['action'] == "deconnexion"){
    session_destroy();
}

require_once("includes/head.inc.php");
require_once("includes/navbar.inc.php");

if(internauteEstConnecte()){
    header("location:admin/publication-affichage.php?action=affichage");
}

if($_POST){
    $resultat = executeRequete("SELECT * FROM membre WHERE pseudo='$_POST[pseudo]'");
    $membre = $resultat->fetch_assoc();
    foreach($membre as $indice => $element){
        if($indice != 'identifiant' && $indice != 'mdp'){
            $_SESSION['membre'][$indice] = $element;
        }
    }
    while($membre = $resultat->fetch_assoc()){
        if($membre['pseudo'] == $_POST['pseudo']){
            if($membre['mdp'] == $_POST['mdp']){
                header("location:admin/publication-affichage.php?action=affichage");
            }
            else{
                $contenu .= '<div class="erreur">Erreur de MDP</div>';
            }
        }
        else{
            $contenu .= '<div class="erreur">Erreur de pseudo</div>';
        }
    }
}
?>

<br><br><br>
<div class="container-fluid">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <aside class="col-sm-12 col-md-8 col-lg-4 ">
            <div class="card">
                <article class="card-body">
	                <h4 class="card-title text-center mb-4 mt-1">Se connecter</h4>
	                <hr>
                    <p class="text-success text-center"><?= $contenu ?></p>
	                <form method="post" action="">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input id="pseudo" name="pseudo" class="form-control" placeholder="Pseudo" type="text">
                            </div>
                        </div>
	                    <div class="form-group">
	                        <div class="input-group">
		                        <div class="input-group-prepend">
		                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		                        </div>
	                            <input class="form-control" placeholder="******" type="password" id="mdp" name="mdp">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <button type="submit" class="btn btn-primary btn-block"> Se connecter  </button>
	                    </div>
	                    <p class="text-center"><a href="motdepasseoublie.php" class="btn">Mot de passe oublié?</a></p>
	                </form>
                </article>
            </div> 
        </aside> 
    </div> 
</div>

<?php include 'includes/link.inc.php'; ?>