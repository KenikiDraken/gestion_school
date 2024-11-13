<?php
require_once('../models/EtudiantReposotory.php');

$etService = new EtudiantReposotory();

$action = '';
if (isset($_GET['action'])) $action = $_GET['action'];
if (isset($_POST['action'])) $action = $_POST['action'];

if (!empty($action)) {
    if ($action == 'form') {
        header('Location: ../views/Etudiant/form.php');
        exit;
    }

    if ($action == 'liste') {
        header('Location: ../views/Etudiant/liste.php');
        exit;
    }

    if ($action == 'delete') {
        $matricule = $_GET['matricule'];
        $etService->delete($matricule);
        header('Location: ../views/Etudiant/liste.php?message=Etudiant supprimé');
        exit;
    }

    if ($action == 'ajout') {
        $matricule = $_POST['matricule'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $sexe = $_POST['sexe'];
        $ddn = $_POST['ddn'];
        $tel = $_POST['tel'];
        $etService->add($matricule, $nom, $prenom, $sexe, $tel, $ddn);
        header('Location: ../views/Etudiant/liste.php?message=Etudiant ajouté');
        exit;
    }

    if ($action == 'editForm') {
        $matricule = $_GET['matricule'];
        header('Location: ../views/Etudiant/edit.php?matricule=' . $matricule);
        exit;
    }

    if ($action == 'modifier') {
        $matricule = $_POST['matricule'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $sexe = $_POST['sexe'];
        $ddn = $_POST['ddn'];
        $tel = $_POST['tel'];
        $etService->edit($matricule, $nom, $prenom, $sexe, $tel, $ddn);
        header('Location: ../views/Etudiant/liste.php?message=Etudiant modifié');
        exit;
    }
}
?>