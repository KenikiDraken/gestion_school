<?php
require_once('Provider.php');

class ProfReposotory
{
    private $connexion;

    function __construct()
    {
        $p = new Provider();
        $this->connexion = $p->getconnection();
    }


    public function add($id_prof, $nom, $prenom, $email, $phone, $faculte)
    {
        $requete = 'insert into professeur (id_prof, nom, prenom, email, phone, faculte) values (:mat, :nm, :pr, :sx, :tl, :dn)';
        $stat = $this->connexion->prepare($requete);
        $rs = $stat->execute([
            'mat' => $id_prof,
            'nm' => $nom,
            'pr' => $prenom,
            'sx' => $email,
            'tl' => $phone,
            'dn' => $faculte
        ]);



    }

    public function edit($id_prof, $nom, $prenom, $email, $phone, $faculte)
    {

        $requete='update professeur set nom=:nm, prenom=:pr, email=:sx, phone=:t, faculte=:d where id_prof=:m';
        $stmt=$this->connexion->prepare($requete);
        $result=$stmt->execute([
            'nm'=> $nom,
            'pr'=> $prenom,
            'sx'=> $email,
            't'=> $phone,
            'd'=> $faculte,
            'm'=> $id_prof
        ]);

    }


    public function getByid_prof($id_prof)
    {
        $requete="select * from professeur where id_prof=:mat";
        $stmt=$this->connexion->prepare($requete);
        $stmt->execute([
            'mat'=> $id_prof
        ]);
        $professeur=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $professeur[0];
    }

    public function getAll()
    {
        $requete = 'select * from professeur order by id_prof desc';
        $st = $this->connexion->query($requete);
        $professeurs = $st->fetchAll(PDO::FETCH_ASSOC);
        return $professeurs;
    }

    public function delete($id_prof)
    {
        $requete='delete from professeur where id_prof=:m';
        $sta=$this->connexion->prepare($requete);
        $res=$sta->execute([
            'm'=> $id_prof
        ]);
    }

}