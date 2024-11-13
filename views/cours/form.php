<?php
require_once("../../models/Provider.php");
$p=new Provider();
$db = $p->getconnection();
// Récupération des profs disponibles
try {
    $professeursStmt = $db->query("SELECT id_prof,nom FROM professeur");
    $professeurs = $professeursStmt->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {
    die("Erreur: " . $e->getMessage());
}
// Récupération des Salles disponibles
try {
    $classesStmt = $db->query("SELECT IdClasse,NomClasse FROM classe");
    $classes = $classesStmt->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {
    die("Erreur: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Ajout Cour</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <!-- Header -->
        <div class="text-center mb-4">
            <h2>Formulaire d'Ajout COURS</h2>
        </div>

        <!-- Student Addition Form -->
        <form action="../../controllers/coursctrl.php" method="post" class="mx-auto p-4 bg-white shadow-sm rounded" style="max-width: 600px;">
            <div class="form-group">
                <label for="id_cours">ID_cours</label>
                <input type="text" id="id_cours" name="id_cours" class="form-control" autocomplete="off" required>
            </div>
            
            <div class="form-group">
                <label for="nom_cours">Matière</label>
                <input type="text" id="nom_cours" name="nom_cours" class="form-control" autocomplete="off" required>
            </div>
            
            <div class="form-group">
                <label for="desc_cours">Description</label>
                <input type="text" id="desc_cours" name="desc_cours" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="id_prof">Nom Professeur</label>
                <select name="id_prof" class="form-control" required>
                    <option value="" disabled selected>Choisissez un professeur</option>
                    <?php foreach ($professeurs as $prof): ?>
                        <option value="<?php echo htmlspecialchars($prof->nom); ?>">
                        <?php echo htmlspecialchars($prof->nom); ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="IdClasse">Salle du Cour</label>
                <select name="IdClasse" class="form-control" required>
                    <option value="" disabled selected>Choisissez une Salle</option>
                    <?php foreach ($classes as $class): ?>
                        <option value="<?php echo htmlspecialchars($class->NomClasse); ?>">
                        <?php echo htmlspecialchars($class->NomClasse); ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <input type="hidden" name="action" value="ajout">

            <div class="text-center">
                <a href="../../controllers/coursctrl.php?action=liste" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Retour</a>
                <button type="reset" class="btn btn-danger mr-2">Vider</button>
                <button type="submit" class="btn btn-success">Ajouter</button>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript for Bootstrap -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
