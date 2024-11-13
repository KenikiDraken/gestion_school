<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification Étudiant</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">

</head>
<body class="bg-light">

<div class="container mt-5">
    
    
    <?php
    $id_prof = $_GET['id_prof'];
    require_once('../../models/ProfReposotory.php');
    $etService = new ProfReposotory();
    $professeur = $etService->getByid_prof($id_prof);
    ?>

    <!-- Student Modification Form -->
    <form action="../../controllers/ProfCtrl.php" method="post" class="mx-auto p-4 bg-white shadow-sm rounded" style="max-width: 600px;">
        <h5 class="text-center mb-4">Formulaire de Modification Professeur</h5>
        <div class="form-group">
            <label for="id_prof">ID PROF</label>
            <input type="text" id="id_prof" name="id_prof" class="form-control" value="<?= $professeur['id_prof'] ?>" readonly required>
        </div>
        
        <div class="form-group">
            <label for="nom">NOM</label>
            <input type="text" id="nom" name="nom" class="form-control" value="<?php echo $professeur['nom']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="prenom">PRENOM</label>
            <input type="text" id="prenom" name="prenom" class="form-control" value="<?= $professeur['prenom'] ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="eamil" id="email" name="email" class="form-control" value="<?= $professeur['email'] ?>" required>
        </div>

        <div class="form-group">
            <label for="phone">TÉLÉPHONE</label>
            <input type="number" id="phone" name="phone" class="form-control" value="<?= $professeur['phone'] ?>" required>
        </div>
        
        <div class="form-group">
            <label for="faculte">FACULTE</label>
            <select id="faculte" name="faculte" class="form-control" required>
                <option value="">Veuillez choisir le faculte du professeur</option>
                <option value="FST" <?php if($professeur['faculte']=='FST') echo 'selected' ?>>FST</option>
                <option value="FSS" <?php if($professeur['faculte']=='FSS') echo 'selected' ?>>FSS</option>
                <option value="FESA" <?php if($professeur['faculte']=='FESA') echo 'selected' ?>>FESA</option>
                <option value="AGRO" <?php if($professeur['faculte']=='AGRO') echo 'selected' ?>>AGRO</option>
                <option value="CHARIA" <?php if($professeur['faculte']=='CHARIA') echo 'selected' ?>>CHARIA</option>
            </select>
        </div>
        
        
        
        <input type="hidden" name="action" value="modifier">
        <div class="text-center">
            <a href="../../controllers/ProfCtrl.php?action=liste" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Retour</a>
            <button type="submit" class="btn btn-success">Modifier</button>
        </div>
    </form>
</div>

<!-- Optional JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
