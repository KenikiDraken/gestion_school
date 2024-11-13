<?php
require_once('../models/ProfReposotory.php');

$etService = new ProfReposotory();

$action = '';
if (isset($_GET['action'])) $action = $_GET['action'];
if (isset($_POST['action'])) $action = $_POST['action'];

if (!empty($action)) {
    if ($action == 'form') {
        header('Location: ../views/professeur/form.php');
        exit;
    }

    if ($action == 'liste') {
        header('Location: ../views/professeur/liste.php');
        exit;
    }

    if ($action == 'delete') {
        $id_prof = $_GET['id_prof'];
        $etService->delete($id_prof);
        header('Location: ../views/professeur/liste.php?message=Professeur supprimé');
        exit;
    }

    if ($action == 'ajout') {
        $id_prof = $_POST['id_prof'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $faculte = $_POST['faculte'];
        $phone = $_POST['phone'];
        $etService->add($id_prof, $nom, $prenom, $email, $phone, $faculte);
        header('Location: ../views/professeur/liste.php?message=Professeur ajouté');
        exit;
    }

    if ($action == 'editForm') {
        $id_prof = $_GET['id_prof'];
        header('Location: ../views/professeur/edit.php?id_prof=' . $id_prof);
        exit;
    }

    if ($action == 'modifier') {
        $id_prof = $_POST['id_prof'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $faculte = $_POST['faculte'];
        $phone = $_POST['phone'];
        $etService->edit($id_prof, $nom, $prenom, $email, $phone, $faculte);
        header('Location: ../views/professeur/liste.php?message=Professeur modifié');
        exit;
    }
}
?>