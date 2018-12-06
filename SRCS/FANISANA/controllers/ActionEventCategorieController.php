<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 30/07/18
 * Time: 16:50
 */

require_once 'QuartierController.php';
include_once '../models/EventCategorie.php';

$action = "";
if($_POST){
    $action = $_POST['action'];
}elseif($_GET){
    $action = $_GET['action'];
}

if($action == 'Tehirizina'){

    $event_name =(isset($_POST['nom_categorie']) && !empty($_POST['nom_categorie'])) ? $_POST['nom_categorie'] : '';

    if(!empty($event_name)){
        $pdo = \App\Config::getInstance()->getPdo();
        $nb =  \models\EventCategorie::SaveEventCategorie($pdo,$event_name);
        if ($nb > 0) {
            $success = " <script type=\"text/javascript\">document.location = \"../views/event.php?message=Voatahiry\";</script>";
            print $success;
        }else{
            $success = " <script type=\"text/javascript\">document.location = \"../views/event.php?message=Tsy Voatahiry\";</script>";
            print $success;
        }
    }else{
        $success = " <script type=\"text/javascript\">document.location = \"../views/event.php?message=Tsy Voatahiry\";</script>";
        print $success;
    }

}