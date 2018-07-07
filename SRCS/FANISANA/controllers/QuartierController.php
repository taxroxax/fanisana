<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 04/07/18
 * Time: 22:02
 */

namespace controllers;
include_once '../models/Quartier.php';
require(dirname(__DIR__) . '/app/config.php');

class QuartierController {
        static function LoadAllQuartier(){
            $pdo = \App\Config::getInstance()->getPdo();
            $list = \models\Quartier::LoadQuartier($pdo);
            return $list;
        }

    static function loadOptionQuartier()
    {
        $pdo = \App\Config::getInstance()->getPdo();
        $option = "";
        foreach (\models\Quartier::LoadQuartier($pdo) as $quartier) :

            $option .= "<option value='" . $quartier->getIdQuartier() . "'>".$quartier->getLibelleQuartier() . "</option>";

        endforeach;
        print $option;
    }
} 