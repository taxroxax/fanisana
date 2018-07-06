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
        $list = \models\Membre::LoadMembre($pdo);
        return $list;
    }
} 