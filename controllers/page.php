<?php

if(isset($_POST["etudiant"])){
    header('location: ../views/Etudiant/liste.php');
}


elseif(isset($_POST["prof"])){
    header('location: ../views/professeur/liste.php');
}


elseif(isset($_POST["salle"])){
    header('location: ../views/salle/liste.php');
}


elseif(isset($_POST["cour"])){
    header('location: ../views/cours/liste.php');
}

elseif(isset($_POST["home"])){
    header('location: ../index.php');
}
?>