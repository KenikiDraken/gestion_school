<?php

require_once("../../models/Provider.php");
$p = new Provider();
$db = $p->getconnection();

session_start();
if (empty($_SESSION['cmp'])) {
    header("location:authent.php");
}

$totalEtudiantStmt = $db->query("SELECT COUNT(*) as total FROM etudiant");
$totalEtudiant = $totalEtudiantStmt->fetch(PDO::FETCH_OBJ)->total;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Étudiants</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" type="text/css" href="../../2style.css">
    <style>

        .container-2 {
        padding: 5px;
        border-image-slice: 1; /* Appliquer le dégradé sur toute la bordure */
        }
    </style>
</head>
<body class="bg-light">
<?php
include('../../navbar.php');
?>
<div class="container mt-5">
    <div class="container-2" style="color: white;">
        <form action="page.php" method="POST">
            <div class="form-group">
                <!-- Page du Jour -->
                <p class="gest_veh">Gestions des Etudiants</p>
            </div>
        </form>
    </div>
    <div class="form-group">
        <div class="container-R-1">
            <form action="../../controllers/page.php" method="POST">
                <p class="gest_veh-1"><i class="fa fa-arrow-left"></i> Retour vers</p>
                <div class ="form-group">
                    <!-- Bouton pour ouvrir le modal -->
                    <button class="btn btn-responsables" type="submit" name="home">
                        <i class="fa fa-door-open"></i>
                        <span>Dashboard</span>
                    </button>

                     <button class="btn btn-responsables" type="submit" name="cour">
                        <i class="fa fa-book-open"></i>
                        <span>Voir les Cours</span>
                    </button>
                </div>
            </form>
        </div>
        <div class="ligne-separation"></div>
        <div class="container-R-2">
            <div class="form-group">
                <p class="gest_veh-1">Gerer les etudiants</p>
            </div>
            <div class ="form-group">
                                    
                <div class="text-center mb-3">
                    <a href="../../controllers/EtudiantCtrl.php?action=form" class="btn btn-respon-1" style="font-weight: bold;font-size: 14px">
                        <i class="fa fa-user">+</i>
                        Ajouter Etudiant
                    </a>
                </div>

                <div class="button-container right-buttons">
                    <div class="btn btn-respon">
                        <span>Total Etudiant</span>
                        <i class="fa fa-users"> <?= $totalEtudiant?></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Success message -->
    <?php 
    if (isset($_GET['message'])) {
    ?>
        <div class="alert alert-success text-center" role="alert">
            <?php echo $_GET['message']; ?>
        </div>
    <?php 
    }
    ?>

    <?php
    require_once('../../models/EtudiantReposotory.php');
    $etService = new EtudiantReposotory();
    $etudiants = $etService->getAll();
    ?>    

    <!-- Student table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>MATRICULE</th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>SEXE</th>
                    <th>TÉLÉPHONE</th>
                    <th>DATE DE NAISSANCE</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($etudiants as $et) { ?>   
                <tr>
                    <td><?php echo $et['matricule']; ?></td>
                    <td><?php echo $et['nom']; ?></td>
                    <td><?php echo $et['prenom']; ?></td>
                    <td><?php echo $et['sexe']; ?></td>
                    <td><?php echo $et['tel']; ?></td>
                    <td><?php echo $et['ddn']; ?></td>
                    <td>
                        <a href="../../controllers/EtudiantCtrl.php?action=editForm&matricule=<?php echo $et['matricule']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="../../controllers/EtudiantCtrl.php?action=delete&matricule=<?php echo $et['matricule']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Optional JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
