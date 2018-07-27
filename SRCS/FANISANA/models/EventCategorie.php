<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 19/07/18
 * Time: 20:44
 */

namespace models;


class EventCategorie {
    private $IdEventCateg;
    private $LibelleEventCategorie;

    function __construct($IdEventCateg, $LibelleEventCategorie)
    {
        $this->IdEventCateg = $IdEventCateg;
        $this->LibelleEventCategorie = $LibelleEventCategorie;
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
     * @param mixed $LibelleEventCategorie
     */
    public function setLibelleEventCategorie($LibelleEventCategorie)
    {
        $this->LibelleEventCategorie = $LibelleEventCategorie;
    }

    /**
     * @return mixed
     */
    public function getLibelleEventCategorie()
    {
        return $this->LibelleEventCategorie;
    }

    static function LoadEventCategorie(\PDO $pdo){
        try {
            $statement = $pdo->prepare('SELECT * FROM event_categorie');
            $statement->execute();
            $categorie = array();
            $i = 0;
            while ($table = $statement->fetch(\PDO::FETCH_ASSOC)){
                $categorie[$i] = new EventCategorie($table['IdEventCateg'],$table['LibelleEventCategorie']);
                $i++;
            }
            $statement->closeCursor();
            return $categorie;
        }catch (\Exception $ex){

        }
    }
} 