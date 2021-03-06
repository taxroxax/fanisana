<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 04/07/18
 * Time: 22:57
 */

namespace controllers;

require_once 'QuartierController.php';
include_once '../models/Membre.php';
class MembreController {
    static function LoadAllMembre(){
        $pdo = \App\Config::getInstance()->getPdo();
        $list = \models\Membre::LoadMembre($pdo,null);
        return $list;
    }
    static function LoadMembreByIdFamille($idFamille){
        $pdo = \App\Config::getInstance()->getPdo();
        $list = \models\Membre::loadMembreByIdFamille($pdo,$idFamille);
        return $list;
    }


    static function loadOptionMembre()
    {
        $pdo = \App\Config::getInstance()->getPdo();
        $option = "";
        foreach (\models\Membre::LoadMembre($pdo,1) as $membre) :

            $option .= "<option value=" . $membre->getIdMembre() . ">".$membre->getNomMembre() . ' ' .$membre->getPrenomMembre(). "</option>";

        endforeach;
        print $option;
    }

    static function loadOptionMembreByGender($gender){
        $pdo = \App\Config::getInstance()->getPdo();
        $option = "";
        foreach (\models\Membre::loadMembreBySexe($pdo,$gender) as $membre) :

            $option .= "<option value=" . $membre->getIdMembre() . ">".$membre->getNomMembre() . ' ' .$membre->getPrenomMembre(). "</option>";

        endforeach;
        print $option;
    }
} 