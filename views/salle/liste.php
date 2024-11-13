<?php
session_start();
if (empty($_SESSION['cmp'])) {
    header("location:authent.php");
}
require_once("../../models/Provider.php");
$p = new Provider();
$db = $p->getconnection();

$totalSallestStmt = $db->query("SELECT COUNT(*) as total FROM classe");
$totalSalle = $totalSallestStmt->fetch(PDO::FETCH_OBJ)->total;

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

    <div class="container-2">

            <div class="form-group">
                <!-- Page du Jour -->
                <p class="gest_veh">Gestions des Salles</p>
            </div>

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
                <p class="gest_veh-1">Gerer les Salles</p>
            </div>
            <div class ="form-group">
                                    
                <div class="text-center mb-3">
                    <a  href="../../controllers/sallectrl.php?action=form" class="btn btn-respon-1" style="font-weight: bold;font-size: 14px">
                        <i class="fa fa-chalkboard-teacher">+</i>
                        Ajouter Salle
                    </a>
                </div>

                <div class="button-container right-buttons">
                    <div class="btn btn-respon">
                        <span>Total Salles</span>
                        <i class="fa fa-university"> <?= $totalSalle?></i>
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
    require_once('../../models/sallereposotory.php');
    $etService = new salereposotory();
    $etudiants = $etService->getAll();
    ?>    

    <!-- Student table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>IdClasse</th>
                    <th>NomClasse</th>
                    <th>Faculte</th>
                    <th>Capacite</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php foreach ($etudiants as $et) { ?>   
                <tr>
                    <td><?php echo $et['IdClasse']; ?></td>
                    <td><?php echo $et['NomClasse']; ?></td>
                    <td><?php echo $et['Faculte']; ?></td>
                    <td><?php echo $et['Capacite']; ?></td>
                    <td>
                    <a href="edit.php?action=editForm&IdClasse=<?php echo $et['IdClasse']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                    <a href="../../controllers/sallectrl.php?action=delete&IdClasse=<?php echo $et['IdClasse']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">Supprimer</a>
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
