<?php
// Si les données arrivent au serveur via la méthode "POST",
// Un peu de cyber Sécurité


// Protection contre les failles de types XSS pour éviter les injections de scripts malveillant


// Protection contre les failles de types CSRF


// Protection contre les spams

// Validation des données (provenant du formulaire)

// Si il y a des erreurs,

// Sauvegarder les anciennes données envoyées en session 
//Sauvegarder les messages d'erreurs ensession   
// redirection vers la page de laquelle proviennent les informations, 

// Arrêt de l'éxecution du script

// Dans le cas contraire, 
// Etablir une connexion avec la base de donnée 

// Effectuer une requête d'insertion des données dans la table "film"

// Effectuer une redirection vers la page d'accueil

// Arrêter l'éxecution du script
?>

 <!-- Chargement de l'entête ainsi que la balise ouvrante du body -->
<?php require __DIR__ . "/components/head.php"; ?>

<!-- Chargement de la barre de navigation -->
<?php require __DIR__ . "/components/nav.php"; ?>

<main class="container">
    <h1 class="text-center display-5 my-3">Nouveau film</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto shadow bg-white p-4">
                <form method="post">
                    <div class ="mb-3">
                        <label for="name">Nom du film</label><span class="text-danger"> *</span>
                        <input type="text" name="name" id="name" class="form-control" autofocus>
                    </div>
                    <div class ="mb-3">
                        <label for="actors">Nom du/des acteur(s) <span class="text-danger">*</span></label>
                        <input type="text" name="actors" id="actors" class="form-control" autofocus>
                    </div>
                    <div class ="mb-3">
                        <label for="review">La note /5</label>
                        <input type="text" name="review" id="review" class="form-control">
                    </div>
                    <div class ="mb-3">
                        <label for="comment">Un commentaire ?</label>
                        <textarea name="comment" id="comment" class="form-control" rows="4"></textarea>                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary shadow">
                    </div>



                </form>
            </div>
        </div>
    </div>
</main>

    <!-- Chargement du pied de page -->
<?php require __DIR__ . "/components/footer.php"; ?>

    <!-- Chargement de la fermeture du document HTML -->
<?php require __DIR__ . "/components/foot.php"; ?>
