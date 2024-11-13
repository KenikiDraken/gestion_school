<?php
require_once('Provider.php');

class coursereposotory
{
    private $connexion;

    function __construct()
    {
        $p = new Provider();
        $this->connexion = $p->getconnection();
    }

  public function add($id_cours, $nom_cours, $desc_cours, $id_prof, $IdClasse)
    {
        $requete = 'insert into cours (id_cours, nom_cours, desc_cours, id_prof, IdClasse) values (:mat, :nm, :pr, :sx, :tl)';
        $stat = $this->connexion->prepare($requete);
        $rs = $stat->execute([
            'mat' => $id_cours,
            'nm' => $nom_cours,
            'pr' => $desc_cours,
            'sx' => $id_prof,
            'tl' => $IdClasse
        ]);



    }

    public function edit($id_cours, $nom_cours, $desc_cours, $id_prof, $IdClasse)
    {

        $requete='update cours set nom_cours=:nm, desc_cours=:pr, id_prof=:sx, IdClasse=:t where id_cours=:m';
        $stmt=$this->connexion->prepare($requete);
        $result=$stmt->execute([
            'nm'=> $nom_cours,
            'pr'=> $desc_cours,
            'sx'=> $id_prof,
            't'=> $IdClasse,
            'm'=> $id_cours
        ]);

    }


    public function getByMatricule($id_cours)
    {
        $requete="select * from cours where id_cours=:mat";
        $stmt=$this->connexion->prepare($requete);
        $stmt->execute([
            'mat'=> $id_cours
        ]);
        $cours=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cours[0];
    }

    public function getAll()
    {
        $requete = 'select * from cours order by id_cours desc';
        $st = $this->connexion->query($requete);
        $courss = $st->fetchAll(PDO::FETCH_ASSOC);
        return $courss;
    }

    public function delete($id_cours)
    {
        $requete='delete from cours where id_cours=:m';
        $sta=$this->connexion->prepare($requete);
        $res=$sta->execute([
            'm'=> $id_cours
        ]);
    }

}
?>