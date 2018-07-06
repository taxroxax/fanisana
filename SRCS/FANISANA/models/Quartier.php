<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 04/07/18
 * Time: 21:56
 */

namespace models;


class Quartier {
    private $IdQuartier;
    private $LibelleQuartier;

    function __construct($IdQuartier, $LibelleQuartier)
    {
        $this->IdQuartier = $IdQuartier;
        $this->LibelleQuartier = $LibelleQuartier;
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
     * @param mixed $LibelleQuartier
     */
    public function setLibelleQuartier($LibelleQuartier)
    {
        $this->LibelleQuartier = $LibelleQuartier;
    }

    /**
     * @return mixed
     */
    public function getLibelleQuartier()
    {
        return $this->LibelleQuartier;
    }

    static function LoadQuartier(\PDO $pdo){
        try {
            $statement = $pdo->prepare('SELECT * FROM quartier');
            $statement->execute();
            $quartier = array();
            $i = 0;
            while ($table = $statement->fetch(\PDO::FETCH_ASSOC)){
                $quartier[$i] = new Quartier($table['IdQuartier'],$table['LibelleQuartier']);
                $i++;
            }
            $statement->closeCursor();
            return $quartier;
        }catch (\Exception $ex){

        }
    }
} 