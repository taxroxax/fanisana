<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 05/07/18
 * Time: 00:39
 */

namespace controllers;

require_once 'QuartierController.php';

include_once '../models/Famille.php';


class FamilleController {
    static function LoadAllFamille(){
        $pdo = \App\Config::getInstance()->getPdo();
        $list = \models\Famille::LoadFamille($pdo);
        return $list;
    }
    static function LoadFamilleById($IdChefFamille){
        $pdo = \App\Config::getInstance()->getPdo();
        $list = \models\Famille::loadFamilleById($pdo,$IdChefFamille);
        return $list;
    }
} 