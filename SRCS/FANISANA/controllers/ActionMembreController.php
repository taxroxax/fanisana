<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 07/07/18
 * Time: 11:21
 */

require_once 'QuartierController.php';
include_once '../models/Membre.php';
include_once '../models/Famille.php';

$action = "";
if($_POST){
    $action = $_POST['action'];
}elseif($_GET){
    $action = $_GET['action'];
}
$chefFamille = isset($_POST['chefFamille']) ? $_POST['chefFamille'] : "";
$NumeroMembre = isset( $_POST['NumeroMembre']) ? $_POST['NumeroMembre'] : "";
$NomMembre = isset( $_POST['NomMembre']) ? $_POST['NomMembre'] : "";
$PrenomMembre = isset( $_POST['PrenomMembre']) ? $_POST['PrenomMembre'] : "";
$datenaiss_membre = isset( $_POST['datenaiss_membre']) ? $_POST['datenaiss_membre'] : "";
$LieuNaissance = isset( $_POST['LieuNaissance']) ? $_POST['LieuNaissance'] : "";
$GenderMembre = isset( $_POST['GenderMembre']) ? $_POST['GenderMembre'] : "";

if($action == 'Tehirizina'){
    $i = 0;
    $j = 0;
    $tmp = array();
    $pdo = \App\Config::getInstance()->getPdo();
    foreach ($NumeroMembre as $element) {
        $chef = null;
        if($chefFamille[$i] == 'oui'){
            $chef = 1;
        }
        $tmp[$i] = array('chefFamille'=>$chef,
            'num' =>$NumeroMembre[$i],
            'NomMembre' =>$NomMembre[$i],
            'PrenomMembre' =>$PrenomMembre[$i],
            'DateNaissance' =>$datenaiss_membre[$i],
            'LieuNaissance' =>$LieuNaissance[$i],
            'GenderMembre' =>$GenderMembre[$i],
        );
        $i++;
    }
    //save membre and ad new famille
    foreach ($tmp as $data){
        if( $tmp[$j]['chefFamille'] != null ){
            \models\Famille::initializeFamille($pdo,$tmp[$j]['num']);
        }
        $nb = \models\Membre::saveMembre($pdo,$tmp[$j]['num'],$tmp[$j]['NomMembre'],$tmp[$j]['PrenomMembre'],$tmp[$j]['DateNaissance'],$tmp[$j]['LieuNaissance'],$tmp[$j]['GenderMembre'],$tmp[$j]['chefFamille']);

        $j++;
    }

    if($nb > 0){
        $success = " <script type=\"text/javascript\">document.location = \"../views/membre.php?message=Voaray ho mpikambana\";</script>";
        print $success;
    }else{
        $echec = " <script type=\"text/javascript\">document.location = \"../views/membre.php?message=Tsy tafiditra ho mpikambana\";</script>";
        print $echec;
    }
}
if($action == "get_numero"){
    $pdo = \App\Config::getInstance()->getPdo();
    $membres =  \models\Membre::LoadMembre($pdo);
    $data = [];
    foreach($membres as $membre){
        $data[] = $membre->getNumeroMembre();
    }
    print json_encode($data);
}

if ($action == "delete"){
    $id_membre = "";
    if(isset($_POST['id_membre']) and !empty($_POST['id_membre'])){
        $id_membre = $_POST['id_membre'];
        if(!empty($id_membre)){
            $pdo = \App\Config::getInstance()->getPdo();
            $nb = \models\Membre::deleteMembre($pdo, $id_membre);
            if ($nb > 0) {
                print 'danger';
            }else{
                print 'error';
            }
        }
    }
}

if ($action == "edit"){
    $id_membre_to_edit = "";
    if(isset($_POST['id_membre_to_edit']) and !empty($_POST['id_membre_to_edit'])){
        $id_membre_to_edit = $_POST['id_membre_to_edit'];
        if(!empty($id_membre_to_edit)){
            $pdo = \App\Config::getInstance()->getPdo();
            $membres =  \models\Membre::loadInfoMembreById($pdo,$id_membre_to_edit);
            $data = [];
            foreach($membres as $membre){
                $data['numero'] = $membre->getNumeroMembre();
                $data['nom'] = $membre->getNomMembre();
                $data['prenom'] = $membre->getPrenomMembre();
            }
            print json_encode($data);
        }
    }


}