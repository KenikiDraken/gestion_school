<?php
require_once('../models/coursereposotory.php');

$etService = new coursereposotory();

$action = '';
if (isset($_GET['action'])) $action = $_GET['action'];
if (isset($_POST['action'])) $action = $_POST['action'];

if (!empty($action)) {
    if ($action == 'form') {
        header('Location: ../views/cours/form.php');
        exit;
    }

    if ($action == 'liste') {
        header('Location: ../views/cours/liste.php');
        exit;
    }

    if ($action == 'delete') {
        $id_cours = $_GET['id_cours'];
        $etService->delete($id_cours);
        header('Location: ../views/cours/liste.php?message= Cours supprimé');
        exit;
    }

    if ($action == 'ajout') {
        $id_cours = $_POST['id_cours'];
        $nom_cours = $_POST['nom_cours'];
        $desc_cours = $_POST['desc_cours'];
        $id_prof = $_POST['id_prof'];
        $IdClasse = $_POST['IdClasse'];
        $etService->add($id_cours, $nom_cours, $desc_cours, $id_prof, $IdClasse);
        header('Location: ../views/cours/liste.php?message=Cours ajouté avec Succés');
        exit;
    }

    if ($action == 'editForm') {
        $id_cours = $_GET['id_cours'];
        header('Location: ../views/cours/edit.php?id_cours=' . $id_cours);
        exit;
    }

    if ($action == 'modifier') {
        $id_cours = $_POST['id_cours'];
        $nom_cours = $_POST['nom_cours'];
        $desc_cours = $_POST['desc_cours'];
        $id_prof = $_POST['id_prof'];
        $IdClasse = $_POST['IdClasse'];
        $tel = $_POST['tel'];
        $etService->edit($id_cours, $nom_cours, $desc_cours, $id_prof,  $IdClasse);
        header('Location: ../views/cours/liste.php?message=Cours modifié avec Succés');
        exit;
    }
}
?>