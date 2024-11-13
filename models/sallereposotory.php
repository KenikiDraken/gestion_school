<?php
require_once('Provider.php');

class salereposotory
{
    private $connexion;

    function __construct()
    {
        $p = new Provider();
        $this->connexion = $p->getconnection();
    }


    public function add($IdClasse, $NomClasse, $Faculte, $Capacite)
    {
        $requete = 'insert into classe (IdClasse, NomClasse, Faculte, Capacite) values (:mat, :nm, :pr, :sx)';
        $stat = $this->connexion->prepare($requete);
        $result = $stat->execute([
            'mat' => $IdClasse,
            'nm' => $NomClasse,
            'pr' => $Faculte,
            'sx' => $Capacite
        ]);

    }

    public function edit($IdClasse, $NomClasse, $Faculte, $capacite)
    {

        $requete='update classe set NomClasse=:nm, Faculte=:pr, capacite=:sx where IdClasse=:m';
        $stmt=$this->connexion->prepare($requete);
        $result=$stmt->execute([
            'nm'=> $NomClasse,
            'pr'=> $Faculte,
            'sx'=> $capacite,
            'm'=> $IdClasse
        ]);

    }


    public function getByIdClasse($IdClasse)
    {
        $requete="select * from classe where IdClasse=:mat";
        $stmt=$this->connexion->prepare($requete);
        $stmt->execute([
            'mat'=> $IdClasse
        ]);
        $classe=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $classe[0];
    }

    public function getAll()
    {
        $requete = 'select * from classe order by IdClasse desc';
        $st = $this->connexion->query($requete);
        $classes = $st->fetchAll(PDO::FETCH_ASSOC);
        return $classes;
    }

    public function delete($IdClasse)
    {
        $requete='delete from classe where IdClasse=:m';
        $sta=$this->connexion->prepare($requete);
        $res=$sta->execute([
            'm'=> $IdClasse
        ]);
    }

}