<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Ajout Étudiant</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body class="bg-light">

<div class="container mt-5">
   
    <!-- Student Addition Form -->
    <form action="../../controllers/EtudiantCtrl.php" method="post" class="mx-auto p-4 bg-white shadow-sm rounded" style="max-width: 600px;">
    <h5 class="text-center mb-4">Formulaire Ajout Étudiant</h5>

        <div class="form-group">
            <label for="matricule">MATRICULE</label>
            <input type="text" id="matricule" name="matricule" class="form-control" autocomplete="off" required>
        </div>
        
        <div class="form-group">
            <label for="nom">NOM</label>
            <input type="text" id="nom" name="nom" class="form-control" autocomplete="off" required>
        </div>
        
        <div class="form-group">
            <label for="prenom">PRENOM</label>
            <input type="text" id="prenom" name="prenom" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="sexe">SEXE</label>
            <select id="sexe" name="sexe" class="form-control" required>
                <option value="" disabled selected>Veuillez choisir le sexe de l'étudiant</option>
                <option value="H">Homme</option>
                <option value="F">Femme</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="tel">TÉLÉPHONE</label>
            <input type="number" id="tel" name="tel" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="ddn">DATE DE NAISSANCE</label>
            <input type="date" id="ddn" name="ddn" class="form-control" required>
        </div>
        
        <input type="hidden" name="action" value="ajout">
        <div class="text-center">
            <a href="../../controllers/EtudiantCtrl.php?action=liste" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Retour</a>
            <button type="reset" class="btn btn-danger mr-2">VIDER</button>
            <button type="submit" class="btn btn-success">AJOUTER</button>
        </div>
    </form>
</div>

<!-- Optional JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
