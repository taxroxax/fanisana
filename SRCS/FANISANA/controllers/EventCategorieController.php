<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 19/07/18
 * Time: 20:49
 */

namespace controllers;

use App\Config;
use models\EventCategorie;

require_once 'QuartierController.php';
require_once '../models/EventCategorie.php';

class EventCategorieController {

    static function LoadEventCategorie(){
        $pdo = \App\Config::getInstance()->getPdo();
        $list = \models\EventCategorie::LoadEventCategorie($pdo);
        return $list;
    }

} 