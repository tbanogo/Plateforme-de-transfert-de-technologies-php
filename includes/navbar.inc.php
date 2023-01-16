        <nav class="navbar navbar-expand-md navbar-light bg-dark fixed-top">
            <div class="collapse navbar-collapse justify-content-between" id="nav">
            <?php
                if(!internauteEstConnecte()){
                    ?>
                    <ul class="navbar-nav">
                    <?php echo '<li class="nav-item"><a class="nav-link text-light font-weight-bold text-uppercase px-3" href="' . RACINE_SITE . 'index.php">Accueil</a></li>' ?>
                    <?php echo '<li class="nav-item"><a class="nav-link text-light font-weight-bold text-uppercase px-3" href="' . RACINE_SITE . 'archives.php">Archives</a></li>' ?>
                    <?php echo '<li class="nav-item"><a class="nav-link text-light font-weight-bold text-uppercase px-3" href="' . RACINE_SITE . 'apropos.php">A propos</a></li>' ?>
                    </ul>
                    <div class="d-flex">
                        <?php echo '<a href="' . RACINE_SITE . 'connexion.php" class="btn btn-primary mx-3 ">Connexion</a>' ?>
                        <?php echo '<a href="' . RACINE_SITE . 'inscription.php" class="btn btn-outline-primary mx-3">Inscription</a>' ?>
                    </div>
                    <?php
                }
                else{
                    ?>
                    <ul class="navbar-nav">
                    <?php echo '<li class="nav-item"><a class="nav-link text-light font-weight-bold text-uppercase px-3" href="' . RACINE_SITE . '/' . 'index.php?action=deconnexion">Accueil</a></li>' ?>
                    <?php echo '<li class="nav-item"><a class="nav-link text-light font-weight-bold text-uppercase px-3" href="' . RACINE_SITE . '/' . 'apropos.php?action=deconnexion">A propos</a></li>' ?>
                    </ul>
                    <div class="d-flex">
                        <?php echo '<a href="' . RACINE_SITE . 'connexion.php?action=deconnexion" class="btn btn-primary mx-3 ">Se déconnecter</a>'; ?>
                    </div>
                    <?php
                }
            ?>
            </div>
        </nav>
        