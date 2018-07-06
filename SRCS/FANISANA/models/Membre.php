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


} 