<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 08/09/18
 * Time: 19:33
 */

namespace models;


class Participer {
    private $IdParticiper;
    private $IdMembre;
    private $IdCategEvent;
    private $DateCreated;

    /**
     * @param mixed $DateCreated
     */
    public function setDateCreated($DateCreated)
    {
        $this->DateCreated = $DateCreated;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->DateCreated;
    }

    /**
     * @param mixed $IdCategEvent
     */
    public function setIdCategEvent($IdCategEvent)
    {
        $this->IdCategEvent = $IdCategEvent;
    }

    /**
     * @return mixed
     */
    public function getIdCategEvent()
    {
        return $this->IdCategEvent;
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
     * @param mixed $IdParticiper
     */
    public function setIdParticiper($IdParticiper)
    {
        $this->IdParticiper = $IdParticiper;
    }

    /**
     * @return mixed
     */
    public function getIdParticiper()
    {
        return $this->IdParticiper;
    }

    function __construct($IdCategEvent, $IdMembre, $IdParticiper, $DateCreated)
    {
        $this->IdCategEvent = $IdCategEvent;
        $this->IdMembre = $IdMembre;
        $this->IdParticiper = $IdParticiper;
        $this->DateCreated = $DateCreated;
    }

    static public function saveParticiper(\PDO $pdo,$IdMembre,$IdCategEvent){
        try {

            $date_created = date("Y-m-d");

            $prepare = $pdo->prepare('INSERT INTO participer(IdMembre,IdCategEvent,DateCreated) VALUES(?,?,?)');
            $prepare->execute(array($IdMembre,$IdCategEvent,$date_created));
            $nb = $prepare->rowCount();
            $prepare->closeCursor();
            return $nb;
        } catch (\PDOException $es) {
            echo $es->getMessage();
        }
    }
} 