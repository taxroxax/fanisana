<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 11/08/18
 * Time: 12:19
 */
require_once 'QuartierController.php';
include_once '../models/Evenement.php';
include_once '../models/Membre.php';
include_once '../models/Participer.php';
$action = "";
if($_POST){
    $action = $_POST['action'];
}elseif($_GET){
    $action = $_GET['action'];
}

$nameEvenement = (isset($_POST['name_event']) && !empty($_POST['name_event'])) ? $_POST['name_event'] : '';
$DateEvenement = (isset($_POST['date_event']) && !empty($_POST['date_event']) ) ? $_POST['date_event'] : '';
$PlaceEvenement = (isset($_POST['place']) && !empty($_POST['place']) ) ? $_POST['place'] : '';
$NumeroMembre1 = (isset($_POST['lahy']) && !empty($_POST['lahy']) ) ? $_POST['lahy'] : '';
$NumeroMembre2 = (isset($_POST['vavy']) && !empty($_POST['vavy']) ) ? $_POST['vavy'] : '';
$DescriptionEvenement = (isset($_POST['description']) && !empty($_POST['description']) ) ? $_POST['description'] : '';
$IdEventCateg = (isset($_POST['id_categorie']) && !empty($_POST['id_categorie']) ) ? $_POST['id_categorie']  : '';
$DateFiance = (isset($_POST['DateFiance']) && !empty($_POST['DateFiance'])) ? $_POST['DateFiance'] : '';

$teste = $action .' '.$DateEvenement .' '.$PlaceEvenement. ' '.$NumeroMembre1 .' ' . $NumeroMembre2 . ' ' . $DescriptionEvenement . ' ' . $IdEventCateg;

$totime_date_evenement_ = strtotime($DateEvenement);
$convert_date_evenement = date('Y-m-d',$totime_date_evenement_);

if(!empty($DateFiance)){
    $totime_date_fiance = strtotime($DateFiance);
    $conver_date_fiance = date('Y-m-d',$totime_date_fiance);
}else{
    $conver_date_fiance = $DateFiance;
}

if($action == 'mariage'){
    $pdo = \App\Config::getInstance()->getPdo();
    if ($NumeroMembre1 == 'default' || $NumeroMembre2 == 'default'){
        $success = " <script type=\"text/javascript\">document.location = \"../views/participate_event.php?message=Tsy Voatahiry&id_event=". $IdEventCateg ."&name_event=". $nameEvenement ."\";</script>";
        print $success;
    }else{
        $nb =  \models\Evenement::SaveEvenenement($pdo,$convert_date_evenement,$DescriptionEvenement,$IdEventCateg,$NumeroMembre1,$NumeroMembre2,$PlaceEvenement,$conver_date_fiance);
        if ($nb > 0) {
            $updateMarieOuiHomme = \models\Membre::updateMarieOui($pdo,$NumeroMembre1);
            $updateMarieOuifemme = \models\Membre::updateMarieOui($pdo,$NumeroMembre2);
            $saveInfo1 =  \models\Participer::saveParticiper($pdo,$NumeroMembre1,$IdEventCateg);
            $saveInfo2 =  \models\Participer::saveParticiper($pdo,$NumeroMembre2,$IdEventCateg);
            $success = " <script type=\"text/javascript\">document.location = \"../views/participate_event.php?message=Voatahiry&id_event=". $IdEventCateg ."&name_event=". $nameEvenement ."\";</script>";
            print $success;
        }else{
            $success = " <script type=\"text/javascript\">document.location = \"../views/participate_event.php?message=Tsy Voatahiry&id_event=". $IdEventCateg ."&name_event=". $nameEvenement ."\";</script>";
            print $success;
        }
    }

}

if($action == 'others'){
    $pdo = \App\Config::getInstance()->getPdo();
    if ($NumeroMembre1 == 'default' || $NumeroMembre2 == 'default'){
        $success = " <script type=\"text/javascript\">document.location = \"../views/participate_event.php?message=Tsy Voatahiry&id_event=". $IdEventCateg ."&name_event=". $nameEvenement ."\";</script>";
        print $success;
    }else{
        $nb =  \models\Evenement::SaveEvenenement($pdo,$convert_date_evenement,$DescriptionEvenement,$IdEventCateg,$NumeroMembre1,$NumeroMembre2,$PlaceEvenement,$conver_date_fiance);
        if ($nb > 0) {
           $saveInfo =  \models\Participer::saveParticiper($pdo,$NumeroMembre1,$IdEventCateg);
            $success = " <script type=\"text/javascript\">document.location = \"../views/participate_event.php?message=Voatahiry&id_event=". $IdEventCateg ."&name_event=". $nameEvenement ."\";</script>";
            print $success;
        }else{
            $success = " <script type=\"text/javascript\">document.location = \"../views/participate_event.php?message=Tsy Voatahiry&id_event=". $IdEventCateg ."&name_event=". $nameEvenement ."\";</script>";
            print $success;
        }
    }

}

