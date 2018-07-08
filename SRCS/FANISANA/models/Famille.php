<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 05/07/18
 * Time: 00:32
 */

namespace models;


class Famille {
    private $IdFamille;
    private $IdChefFamille;
    private $AdresseFamille;
    private $CodePostal;
    private $Ville;
    private $CodePays;
    private $Telephone;
    private $Email;
    private $IdQuartier;

    function __construct($AdresseFamille, $CodePays, $CodePostal, $Email, $IdChefFamille, $IdFamille, $IdQuartier, $Telephone, $Ville)
    {
        $this->AdresseFamille = $AdresseFamille;
        $this->CodePays = $CodePays;
        $this->CodePostal = $CodePostal;
        $this->Email = $Email;
        $this->IdChefFamille = $IdChefFamille;
        $this->IdFamille = $IdFamille;
        $this->IdQuartier = $IdQuartier;
        $this->Telephone = $Telephone;
        $this->Ville = $Ville;
    }

    /**
     * @param mixed $AdresseFamille
     */
    public function setAdresseFamille($AdresseFamille)
    {
        $this->AdresseFamille = $AdresseFamille;
    }

    /**
     * @return mixed
     */
    public function getAdresseFamille()
    {
        return $this->AdresseFamille;
    }

    /**
     * @param mixed $CodePays
     */
    public function setCodePays($CodePays)
    {
        $this->CodePays = $CodePays;
    }

    /**
     * @return mixed
     */
    public function getCodePays()
    {
        return $this->CodePays;
    }

    /**
     * @param mixed $CodePostal
     */
    public function setCodePostal($CodePostal)
    {
        $this->CodePostal = $CodePostal;
    }

    /**
     * @return mixed
     */
    public function getCodePostal()
    {
        return $this->CodePostal;
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param mixed $IdChefFamille
     */
    public function setIdChefFamille($IdChefFamille)
    {
        $this->IdChefFamille = $IdChefFamille;
    }

    /**
     * @return mixed
     */
    public function getIdChefFamille()
    {
        return $this->IdChefFamille;
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
     * @param mixed $IdQuartier
     */
    public function setIdQuartier($IdQuartier)
    {
        $this->IdQuartier = $IdQuartier;
    }

    /**
     * @return mixed
     */
    public function getIdQuartier()
    {
        return $this->IdQuartier;
    }

    /**
     * @param mixed $Telephone
     */
    public function setTelephone($Telephone)
    {
        $this->Telephone = $Telephone;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->Telephone;
    }

    /**
     * @param mixed $Ville
     */
    public function setVille($Ville)
    {
        $this->Ville = $Ville;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->Ville;
    }


    static function LoadFamille(\PDO $pdo){
        try {
            $statement = $pdo->prepare('SELECT * FROM famille');
            $statement->execute();
            $famille = array();
            $i = 0;
            while ($table = $statement->fetch(\PDO::FETCH_ASSOC)){
                $famille[$i] = new Famille($table['AdresseFamille'], $table['CodePays'], $table['CodePostal'], $table['Email'], $table['IdChefFamille'], $table['IdFamille'], $table['IdQuartier'], $table['Telephone'], $table['Ville']);
                $i++;
            }
            $statement->closeCursor();
            return $famille;
        }catch (\Exception $ex){

        }
    }

    //initialize famille
    static public function initializeFamille(\PDO $pdo,$idChefFamille){
        try {
            $prepare = $pdo->prepare('INSERT INTO famille(IdChefFamille) VALUES(?)');
            $prepare->execute(array($idChefFamille));
            $nb = $prepare->rowCount();
            $prepare->closeCursor();
            return $nb;
        } catch (\PDOException $es) {
            echo $es->getMessage();
        }
    }

    static function updateInfoFamille(\PDO $pdo,$AdresseFamille,$CodePostal,$Ville,$CodePays,$Telephone,$Email,$IdQuartier,$IdChefFamille){
        try {
            $statement = $pdo->prepare('UPDATE famille SET AdresseFamille= ?, CodePostal= ?, Ville= ? ,CodePays= ?, Telephone= ?, Email= ?, IdQuartier = ? WHERE IdChefFamille= ? ');
            $statement->execute(array($AdresseFamille,$CodePostal,$Ville,$CodePays,$Telephone,$Email,$IdQuartier,$IdChefFamille));
            $statement->closeCursor();
            $nb = $statement->rowCount();
            return $nb;
        } catch (\PDOException $ex) {
            return $ex->getMessage();
        }
    }

    static function loadFamilleById(\PDO $pdo,$IdChefFamille){
        try {
            $statement = $pdo->prepare('SELECT * FROM famille WHERE IdChefFamille = ?');
            $statement->execute(array($IdChefFamille));
            $famille = array();
            $i = 0;
            while ($table = $statement->fetch(\PDO::FETCH_ASSOC)) {
                $famille[$i] = new Famille($table['AdresseFamille'], $table['CodePays'], $table['CodePostal'], $table['Email'], $table['IdChefFamille'], $table['IdFamille'], $table['IdQuartier'], $table['Telephone'], $table['Ville']);
                $i++;
            }
            $statement->closeCursor();
            return $famille;
        } catch (\Exception $ex) {
        }

    }
} 