<?php 
session_start();

//  Définition du titre spécifique à la page -->
    $title = "Page d'accueil"; 
    ?>
   <?php 
//    <!-- Chargement de l'entête ainsi que la balise ouvrante du body -->
   require __DIR__ . "/components/head.php";
   ?>
    
    <!-- Chargement de la barre de navigation -->
    <?php require __DIR__ . "/components/nav.php";?>
    
    <!-- Chargement du contenu spécifique à la page -->
    <main class="container">
        <h1 class="text-center my-3 display-5">Liste des films</h1>
    
        <?php if(isset($_SESSION['success']) && !empty($_SESSION['success'])) : ?>
            <div class="alert alert-success" role="alert">
                <?= $_SESSION['success']?>
            </div>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION["success"]?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset ($_SESSION['success']); ?>
        <?php endif ?>


        <div class="d-flex justify-content-end align-items-center">
            <a href="create.php" class="btn btn-primary">Nouveau film</a>
        </div>
    </main>
    
    <!-- Chargement du pied de page -->
    <?php require __DIR__ . "/components/footer.php";?>
    
    <!-- Chargement de la fermeture du document HTML -->
    <?php require __DIR__ . "/components/foot.php";?>

