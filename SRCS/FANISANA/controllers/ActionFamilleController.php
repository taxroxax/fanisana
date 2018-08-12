<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 07/07/18
 * Time: 13:58
 */

require_once 'QuartierController.php';
include_once '../models/Famille.php';
include_once '../models/Membre.php';

$action = "";
if($_POST){
    $action = $_POST['action'];
}elseif($_GET){
    $action = $_GET['action'];
}

$action = $_POST['action'];
$idChef =(isset($_POST['idChef']) && !empty($_POST['idChef'])) ? $_POST['idChef'] : '';
$quartier =(isset($_POST['quartier']) && !empty($_POST['quartier'])) ? $_POST['quartier'] : '';
$adresse =(isset($_POST['adresse']) && !empty($_POST['adresse'])) ? $_POST['adresse'] : '';
$ville =(isset($_POST['ville']) && !empty($_POST['ville'])) ? $_POST['ville'] : '';
$codepostale =(isset($_POST['codepostale']) && !empty($_POST['codepostale'])) ? $_POST['codepostale'] : '';
$codepays =(isset($_POST['codepays']) && !empty($_POST['codepays'])) ? $_POST['codepays'] : '';
$phone =(isset($_POST['phone']) && !empty($_POST['phone'])) ? $_POST['phone'] : '';
$mail =(isset($_POST['mail']) && !empty($_POST['mail'])) ? $_POST['mail'] : '';
$membre =(isset($_POST['membre']) && !empty($_POST['membre'])) ? $_POST['membre'] : '';
$idfamille =(isset($_POST['idfamille']) && !empty($_POST['idfamille'])) ? $_POST['idfamille'] : '';
$count = 0;
if($action == 'Tehirizina'){
        $pdo = \App\Config::getInstance()->getPdo();
        $nb = \models\Famille::updateInfoFamille($pdo,$adresse,$codepostale,$ville,$codepays,$phone,$mail,$quartier,$idChef);
    $count = count($membre);
    if($count > 0){
        for($i = 0; $i<$count;$i++ ){
           \models\Membre::updateInfoMembre($pdo,$idfamille,$membre[$i]);
        }
    }

    if ($nb > 0) {
        $success = " <script type=\"text/javascript\">document.location = \"../views/famille.php?message=Voatahiry\";</script>";
        print $success;
    }else{
        $success = " <script type=\"text/javascript\">document.location = \"../views/famille.php?message=Tsy Voatahiry\";</script>";
        print $success;
    }
}
