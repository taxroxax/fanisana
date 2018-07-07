<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 07/07/18
 * Time: 11:21
 */

require_once 'QuartierController.php';
include_once '../models/Membre.php';

$action = "";
if($_POST){
    $action = $_POST['action'];
}elseif($_GET){
    $action = $_GET['action'];
}


$NumeroMembre = $_POST['NumeroMembre'];
$NomMembre = $_POST['NomMembre'];
$PrenomMembre = $_POST['PrenomMembre'];
$datenaiss_membre = $_POST['datenaiss_membre'];
$LieuNaissance = $_POST['LieuNaissance'];
$GenderMembre = $_POST['GenderMembre'];

if($action == 'Tehirizina'){
    $i = 0;
    $j = 0;
    $tmp = array();
    $pdo = \App\Config::getInstance()->getPdo();
    foreach ($NumeroMembre as $element) {

        $tmp[$i] = array('num' =>$NumeroMembre[$i],
            'NomMembre' =>$NomMembre[$i],
            'PrenomMembre' =>$PrenomMembre[$i],
            'DateNaissance' =>$datenaiss_membre[$i],
            'LieuNaissance' =>$LieuNaissance[$i],
            'GenderMembre' =>$GenderMembre[$i],
        );
        $i++;
    }
    foreach ($tmp as $data){
        $nb = \models\Membre::saveMembre($pdo,$tmp[$j]['num'],$tmp[$j]['NomMembre'],$tmp[$j]['PrenomMembre'],$tmp[$j]['DateNaissance'],$tmp[$j]['LieuNaissance'],$tmp[$j]['GenderMembre']);
        $j++;
    }

    if($nb > 0){
        $success = " <script type=\"text/javascript\">document.location = \"../views/membre.php?message=Voaray ho mpikambana\";</script>";
        print $success;
    }

}



