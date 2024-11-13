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
    <title>Modification Étudiant</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h2>Formulaire de Modification des cours</h2>
        </div>
        
        <?php
            $id_cours = $_GET['id_cours'];
            require_once('../../models/coursereposotory.php');
            $etService = new coursereposotory();
            $cours = $etService->getByMatricule($id_cours);
        ?>

        <form action="../../controllers/coursctrl.php" method="post" class="mx-auto p-4 bg-white shadow-sm rounded" style="max-width: 600px;">
            <div class="form-group">
                <label for="id_cours">id_cours</label>
                <input type="text" id="id_cours" name="id_cours" class="form-control" value="<?= $cours['id_cours'] ?>" readonly required>
            </div>

            <div class="form-group">
                <label for="nom_cours">nom_cours</label>
                <input type="text" id="nom_cours" name="nom_cours" class="form-control" value="<?= $cours['nom_cours'] ?>" required>
            </div>

            <div class="form-group">
                <label for="desc_cours">Prénom_cours</label>
                <input type="text" id="desc_cours" name="desc_cours" class="form-control" value="<?= $cours['desc_cours'] ?>" required>
            </div>

          
            <div class="form-group">
                <label for="id_prof">Nom du Prof</label>
                <select name="id_prof" class="form-control" required>
                    <option value="" disabled selected>Choisissez un vehicule</option>
                    <?php foreach ($professeurs as $prof): ?>
                        <option value="<?php echo htmlspecialchars($prof->nom); ?>">
                        <?php echo htmlspecialchars($prof->nom); ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
            <label for="IdClasse">Salle</label>
                <select name="IdClasse" class="form-control" required>
                    <option value="" disabled selected>Choisissez un vehicule</option>
                    <?php foreach ($classes as $class): ?>
                        <option value="<?php echo htmlspecialchars($class->NomClasse); ?>">
                        <?php echo htmlspecialchars($class->NomClasse); ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <input type="hidden" name="action" value="modifier">

            <div class="text-center">
                <a href="../../controllers/coursctrl.php?action=liste" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Retour</a>
                <button type="submit" class="btn btn-success">Modifier</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
