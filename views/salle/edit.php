<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification Salle</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body class="bg-light">

<div class="container mt-5">
    
    
    <?php
    $IdClasse = $_GET['IdClasse'];
    require_once('../../models/sallereposotory.php');
    $etService = new salereposotory();
    $classe = $etService->getByIdClasse($IdClasse);
    ?>

    <!-- Student Modification Form -->
    <form action="../../controllers/sallectrl.php" method="post" class="mx-auto p-4 bg-white shadow-sm rounded" style="max-width: 600px;">
        <h5 class="text-center mb-4">Formulaire de Modification Salle</h5>
        <div class="form-group">
            <label for="IdClasse">ID CLASSE</label>
            <input type="text" id="IdClasse" name="IdClasse" class="form-control" value="<?= $classe['IdClasse'] ?>" readonly required>
        </div>
        
        <div class="form-group">
            <label for="NomClasse">NomClasse</label>
            <input type="text" id="NomClasse" name="NomClasse" class="form-control" value="<?php echo $classe['NomClasse']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="Faculte">Faculte</label>
            <input type="text" id="Faculte" name="Faculte" class="form-control" value="<?= $classe['Faculte'] ?>" required>
        </div>

        <div class="form-group">
            <label for="Capacite">Capacite</label>
            <input type="text" id="Capacite" name="Capacite" class="form-control" value="<?= $classe['Capacite'] ?>" required>
        </div>
        
        
        <input type="hidden" name="action" value="modifier">
        <div class="text-center">
            <a href="../../controllers/sallectrl.php?asction=liste" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Retour</a>
            <button type="submit" class="btn btn-success">MODIFIER</button>
        </div>
    </form>
</div>

<!-- Optional JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
