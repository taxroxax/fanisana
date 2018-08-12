<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 11/08/18
 * Time: 12:25
 */

namespace models;


class Evenement {
    private $IdEvent;
    private $DateEvenement;
    private $PlaceEvenement;
    private $NumeroMembre1;
    private $NumeroMembre2;
    private $DescriptionEvenement;
    private $IdEventCateg;
    private $DateFiance;

    /**
     * @param mixed $DateEvenement
     */
    public function setDateEvenement($DateEvenement)
    {
        $this->DateEvenement = $DateEvenement;
    }

    /**
     * @return mixed
     */
    public function getDateEvenement()
    {
        return $this->DateEvenement;
    }

    /**
     * @param mixed $DescriptionEvenement
     */
    public function setDescriptionEvenement($DescriptionEvenement)
    {
        $this->DescriptionEvenement = $DescriptionEvenement;
    }

    /**
     * @return mixed
     */
    public function getDescriptionEvenement()
    {
        return $this->DescriptionEvenement;
    }

    /**
     * @param mixed $IdEvent
     */
    public function setIdEvent($IdEvent)
    {
        $this->IdEvent = $IdEvent;
    }

    /**
     * @return mixed
     */
    public function getIdEvent()
    {
        return $this->IdEvent;
    }

    /**
     * @param mixed $IdEventCateg
     */
    public function setIdEventCateg($IdEventCateg)
    {
        $this->IdEventCateg = $IdEventCateg;
    }

    /**
     * @return mixed
     */
    public function getIdEventCateg()
    {
        return $this->IdEventCateg;
    }

    /**
     * @param mixed $NumeroMembre1
     */
    public function setNumeroMembre1($NumeroMembre1)
    {
        $this->NumeroMembre1 = $NumeroMembre1;
    }

    /**
     * @return mixed
     */
    public function getNumeroMembre1()
    {
        return $this->NumeroMembre1;
    }

    /**
     * @param mixed $NumeroMembre2
     */
    public function setNumeroMembre2($NumeroMembre2)
    {
        $this->NumeroMembre2 = $NumeroMembre2;
    }

    /**
     * @return mixed
     */
    public function getNumeroMembre2()
    {
        return $this->NumeroMembre2;
    }

    /**
     * @param mixed $PlaceEvenement
     */
    public function setPlaceEvenement($PlaceEvenement)
    {
        $this->PlaceEvenement = $PlaceEvenement;
    }

    /**
     * @return mixed
     */
    public function getPlaceEvenement()
    {
        return $this->PlaceEvenement;
    }

    /**
     * @param mixed $DateFiance
     */
    public function setDateFiance($DateFiance)
    {
        $this->DateFiance = $DateFiance;
    }

    /**
     * @return mixed
     */
    public function getDateFiance()
    {
        return $this->DateFiance;
    }

    function __construct($DateEvenement, $DescriptionEvenement, $IdEvent, $IdEventCateg, $NumeroMembre1, $NumeroMembre2, $PlaceEvenement, $DateFiance)
    {
        $this->DateEvenement = $DateEvenement;
        $this->DescriptionEvenement = $DescriptionEvenement;
        $this->IdEvent = $IdEvent;
        $this->IdEventCateg = $IdEventCateg;
        $this->NumeroMembre1 = $NumeroMembre1;
        $this->NumeroMembre2 = $NumeroMembre2;
        $this->PlaceEvenement = $PlaceEvenement;
        $this->$DateFiance = $DateFiance;
    }

    public static function SaveEvenenement(\PDO $pdo,$DateEvenement, $DescriptionEvenement, $IdEventCateg, $NumeroMembre1, $NumeroMembre2, $PlaceEvenement, $DateFiance){
        try{
            $prepare = $pdo->prepare('INSERT INTO evenement(DateEvenement,DescriptionEvenement,IdEventCateg,NumeroMembre1,NumeroMembre2,PlaceEvenement,DateFiance) VALUES(?,?,?,?,?,?,?)');
            $prepare->execute(array($DateEvenement, $DescriptionEvenement, $IdEventCateg, $NumeroMembre1, $NumeroMembre2, $PlaceEvenement, $DateFiance));
            $nb = $prepare->rowCount();
            $prepare->closeCursor();
            return $nb;
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
        }
    }
} 