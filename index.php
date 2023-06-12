<?php 
session_start();


//  Définition du titre spécifique à la page -->
    $title = "Page d'accueil"; 

$font_awesome = <<<HTML
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
HTML;

    // Etabillons une connexion avec la base de donnée
    require __DIR__ . "/db/connexion.php";

    // Effectuons une requête de selection des données de la table "film".
    $req = $db->prepare("SELECT * FROM film ORDER BY created_at DESC");
    $req->execute();
    $films = $req->fetchAll();


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

        <?php if($films) : ?>
            <div class="container d-flex flex-column justify-content-center align-items-center">
                <?php foreach($films as $film) : ?>
                    <div class="card text-start my-3 shadow">
                        <div class="card-body">
                            <p class="card-title">Nom du film : <? $film['name']; ?></p>
                            <p class="card-text">Nom du/des acteur(s): <?= $film['actors']?></p>
                            <hr>
                            <a data-bs-toggle="modal" data-bs-target="#modal<?= $film['id'] ?>" title="Voir détails du film" href="" class="mx-3 text-dark"><i class="fa-solid fa-eye"></i></a>

                            <!-- Modal -->
                            <div class="modal fade" id="modal<?= $film['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                          <h1 class="modal-title fs-5"><?= $film['name'] ?> </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Note du film : <?= (isset($film['review']) && !empty($film['review'])) ? $film['review'] : "Non renseigné";?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                </div>
                                </div>
                            </div>
                            </div>
                            <a title="Modifier" href="edit.php?film_id=<?= $film['id'];?>" class="mx-3 text-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a title="Supprimer" href="" class="mx-3 text-danger"><i class="fa-solid fa-trash-can"></i></a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

                <?php else : ?>
                    <p class="mt-5 text-center">Aucun film ajouté à la liste pour l'instant.</p>
                <?php endif ?>
                </main>
    
    <!-- Chargement du pied de page -->
    <?php require __DIR__ . "/components/footer.php";?>
    
    <!-- Chargement de la fermeture du document HTML -->
    <?php require __DIR__ . "/components/foot.php";?>

