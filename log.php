<?php
require_once("models/Provider.php");
$p = new Provider();
$db = $p->getconnection();

session_start();

extract($_POST);
if($_POST['acces']=='1')
{  
   $v=$db->prepare("SELECT compte,motpasse FROM user where compte=? and motpasse=?");
   $v->execute([$compte,$motpasse]);
   $tabv=$v->fetch();
   if($tabv['compte']==$compte && $tabv['motpasse']==$motpasse)
   {
       $_SESSION['cmp']=$compte;
       header("location:index.php");
   }
   else
   {
       header("location:authent.php?msg=1");   
   }
}

if($_POST['register']=='1')
{  
    $compte = $_POST['compte'];
    $nomPrenom = $_POST['nomPrenom'];
    $email = $_POST['email'];
    $motpasse = $_POST['motpasse'];

    $requete = 'insert into user (compte, nomPrenom, email, motpasse) values (:com, :nm, :mail, :mp)';
    $stat = $db->prepare($requete);
    $rs = $stat->execute([
        'com' => $compte,
        'nm' => $nomPrenom,
        'mail' => $email,
        'mp' => $motpasse
    ]);

    header("Location: authent.php");
    exit();
}

if($_GET['quitter']=='1'){
    unset($_SESSION['cmp']);
    session_destroy();
    header("location:authent.php?msg=2");
}

?>