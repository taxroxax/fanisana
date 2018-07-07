<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 04/07/18
 * Time: 22:48
 */

namespace models;


class Membre {

    private $IdMembre;
    private $NumeroMembre;
    private $NomMembre;
    private $PrenomMembre;
    private $DateNaissance;
    private $LieuNaissance;
    private $GenderMembre;
    private $StatusMembre;
    private $IdFamille;

    function __construct($DateNaissance, $GenderMembre, $IdFamille, $IdMembre, $LieuNaissance, $NomMembre, $NumeroMembre, $PrenomMembre, $StatusMembre)
    {
        $this->DateNaissance = $DateNaissance;
        $this->GenderMembre = $GenderMembre;
        $this->IdFamille = $IdFamille;
        $this->IdMembre = $IdMembre;
        $this->LieuNaissance = $LieuNaissance;
        $this->NomMembre = $NomMembre;
        $this->NumeroMembre = $NumeroMembre;
        $this->PrenomMembre = $PrenomMembre;
        $this->StatusMembre = $StatusMembre;
    }

    /**
     * @param mixed $DateNaissance
     */
    public function setDateNaissance($DateNaissance)
    {
        $this->DateNaissance = $DateNaissance;
    }

    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->DateNaissance;
    }

    /**
     * @param mixed $GenderMembre
     */
    public function setGenderMembre($GenderMembre)
    {
        $this->GenderMembre = $GenderMembre;
    }

    /**
     * @return mixed
     */
    public function getGenderMembre()
    {
        return $this->GenderMembre;
    }

    /**
     * @param mixed $IdFamille
     */
    public function setIdFamille($IdFamille)
    {
        $this->IdFamille = $IdFamille;
    }

    /**
     * @return mixed
     */
    public function getIdFamille()
    {
        return $this->IdFamille;
    }

    /**
     * @param mixed $IdMembre
     */
    public function setIdMembre($IdMembre)
    {
        $this->IdMembre = $IdMembre;
    }

    /**
     * @return mixed
     */
    public function getIdMembre()
    {
        return $this->IdMembre;
    }

    /**
     * @param mixed $LieuNaissance
     */
    public function setLieuNaissance($LieuNaissance)
    {
        $this->LieuNaissance = $LieuNaissance;
    }

    /**
     * @return mixed
     */
    public function getLieuNaissance()
    {
        return $this->LieuNaissance;
    }

    /**
     * @param mixed $NomMembre
     */
    public function setNomMembre($NomMembre)
    {
        $this->NomMembre = $NomMembre;
    }

    /**
     * @return mixed
     */
    public function getNomMembre()
    {
        return $this->NomMembre;
    }

    /**
     * @param mixed $NumeroMembre
     */
    public function setNumeroMembre($NumeroMembre)
    {
        $this->NumeroMembre = $NumeroMembre;
    }

    /**
     * @return mixed
     */
    public function getNumeroMembre()
    {
        return $this->NumeroMembre;
    }

    /**
     * @param mixed $PrenomMembre
     */
    public function setPrenomMembre($PrenomMembre)
    {
        $this->PrenomMembre = $PrenomMembre;
    }

    /**
     * @return mixed
     */
    public function getPrenomMembre()
    {
        return $this->PrenomMembre;
    }

    /**
     * @param mixed $StatusMembre
     */
    public function setStatusMembre($StatusMembre)
    {
        $this->StatusMembre = $StatusMembre;
    }

    /**
     * @return mixed
     */
    public function getStatusMembre()
    {
        return $this->StatusMembre;
    }


    static function LoadMembre(\PDO $pdo){
        try {
            $statement = $pdo->prepare('SELECT * FROM membre');
            $statement->execute();
            $membre = array();
            $i = 0;
            while ($table = $statement->fetch(\PDO::FETCH_ASSOC)){
                $membre[$i] = new Membre($table['DateNaissance'], $table['GenderMembre'], $table['IdFamille'], $table['IdMembre'], $table['LieuNaissance'], $table['NomMembre'], $table['NumeroMembre'], $table['PrenomMembre'], $table['StatusMembre']);
                $i++;
            }
            $statement->closeCursor();
            return $membre;
        }catch (\Exception $ex){

        }
    }

    static public function saveMembre(\PDO $pdo,$NumeroMembre,$NomMembre,$PrenomMembre,$DateNaissance,$LieuNaissance,$GenderMembre,$chefFamille){
        try {

            $date = strtotime($DateNaissance);
            $datenaiss_format = date('Y-m-d',$date);
            $sexe = null;

            if($GenderMembre == 'Vavy'){
                $sexe = 0;
            }else{
                $sexe = 1;
            }

            $prepare = $pdo->prepare('INSERT INTO membre(NumeroMembre,NomMembre,PrenomMembre,DateNaissance,LieuNaissance,GenderMembre,StatusMembre) VALUES(?,?,?,?,?,?,?)');
            $prepare->execute(array($NumeroMembre,$NomMembre,$PrenomMembre,$datenaiss_format,$LieuNaissance,$sexe,$chefFamille));
            $nb = $prepare->rowCount();
            $prepare->closeCursor();
            return $nb;
        } catch (\PDOException $es) {
            echo $es->getMessage();
        }
    }

    static function updateInfoMembre(\PDO $pdo,$IdFamille,$IdMembre){
        try {
            $statement = $pdo->prepare('UPDATE membre SET IdFamille= ? WHERE IdMembre= ? ');
            $statement->execute(array($IdFamille,$IdMembre));
            $statement->closeCursor();
            $nb = $statement->rowCount();
            return $nb;
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
        }
    }


} 