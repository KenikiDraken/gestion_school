<?php
require_once('Provider.php');

class EtudiantReposotory
{
    private $connexion;

    function __construct()
    {
        $p = new Provider();
        $this->connexion = $p->getconnection();
    }


    public function add($matricule, $nom, $prenom, $sexe, $tel, $ddn)
    {
        $requete = 'insert into etudiant (matricule, nom, prenom, sexe, tel, ddn) values (:mat, :nm, :pr, :sx, :tl, :dn)';
        $stat = $this->connexion->prepare($requete);
        $rs = $stat->execute([
            'mat' => $matricule,
            'nm' => $nom,
            'pr' => $prenom,
            'sx' => $sexe,
            'tl' => $tel,
            'dn' => $ddn
        ]);



    }

    public function edit($matricule, $nom, $prenom, $sexe, $tel, $ddn)
    {

        $requete='update etudiant set nom=:nm, prenom=:pr, sexe=:sx, tel=:t, ddn=:d where matricule=:m';
        $stmt=$this->connexion->prepare($requete);
        $result=$stmt->execute([
            'nm'=> $nom,
            'pr'=> $prenom,
            'sx'=> $sexe,
            't'=> $tel,
            'd'=> $ddn,
            'm'=> $matricule
        ]);

    }


    public function getByMatricule($matricule)
    {
        $requete="select * from etudiant where matricule=:mat";
        $stmt=$this->connexion->prepare($requete);
        $stmt->execute([
            'mat'=> $matricule
        ]);
        $etudiant=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $etudiant[0];
    }

    public function getAll()
    {
        $requete = 'select * from etudiant order by matricule desc';
        $st = $this->connexion->query($requete);
        $etudiants = $st->fetchAll(PDO::FETCH_ASSOC);
        return $etudiants;
    }

    public function delete($matricule)
    {
        $requete='delete from etudiant where matricule=:m';
        $sta=$this->connexion->prepare($requete);
        $res=$sta->execute([
            'm'=> $matricule
        ]);
    }

}