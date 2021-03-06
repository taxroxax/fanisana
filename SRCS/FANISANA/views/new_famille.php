<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 07/07/18
 * Time: 13:20
 */
require(dirname(__DIR__).'\controllers\FamilleController.php');
require(dirname(__DIR__).'\controllers\MembreController.php');

$listFamille = \controllers\FamilleController::LoadAllFamille();


$idFamille = null;
$idChef = "";
if($_GET){
    $idChef = $_GET['idChef'];
}
$loadFamilleById = \controllers\FamilleController::LoadFamilleById($idChef);

foreach($loadFamilleById as $famille){
    $idFamille = $famille->getIdFamille();
    $AdresseFamille = $famille->getAdresseFamille();
    $CodePays = $famille->getCodePays();
    $CodePostal = $famille->getCodePostal();
    $Email = $famille->getEmail();
    $IdQuartier = $famille->getIdQuartier();
    $Telephone = $famille->getTelephone();
    $Ville = $famille->getVille();

}

$listMembreByIdFamille = \controllers\MembreController::LoadMembreByIdFamille($idFamille);

include_once "header.php";?>

<div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try {
                ace.settings.check('breadcrumbs', 'fixed')
            } catch (e) {
            }
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="index.php">TONGASOA</a>
            </li>
            <li class="active">FIANAKAVIANA</li>
        </ul>
        <!-- .breadcrumb -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <a href="#">
                <h1>
                    Fianakaviana <?php  echo $idFamille;  ?>
                </h1>
            </a>
        </div><!-- /.page-header -->
        <form name="hanampy"action="../controllers/ActionFamilleController.php" method="post">
        <input type="hidden" name="idChef" value="<?php echo $idChef; ?>">
        <input type="hidden" name="idfamille" value="<?php echo $idFamille; ?>">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="widget-box">

                                <div class="widget-header">
                                    <h4>Laharan'ny karatry ny Filoham-pianakaviana : <?php echo $idChef; ?></h4>
                                    <div class="widget-toolbar">
                                        <span class="label label-lg label-success arrowed-right">
                                                           <i class="icon-warning-sign bigger-120"></i>
                                                            Tsindrio ity rehefa vita ny famenoana
                                        </span>
                                        <input class="btn btn-xs btn-light" type="submit" name="action" value="Tehirizina" >
                                        &nbsp;

                                        <a href="#" data-action="collapse">
                                            <i class="icon-chevron-up"></i>
                                        </a>
                                    </div>
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <!--table hanapy-->
                                            <div class="table-responsive">
                                                <table id="" class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Faritra</th>
                                                        <th>Adiresy</th>
                                                        <th>Tanana</th>
                                                        <th>Kaody Positaly</th>
                                                        <th>Kaody Toerana</th>
                                                        <th>Finday</th>
                                                        <th>Mailaka</th>
                                                    </tr>
                                                    <tbody>
                                                    <tr>
                                                        <td> <select required="required" id="Quartier" name="quartier" class="form-control" id="form-field-select-1">
                                                                <?php \controllers\QuartierController::loadOptionQuartier(); ?>
                                                                <select>
                                                        </td>
                                                        <td><input required="required" class="col-xs-8 col-sm-11" value="<?php echo $AdresseFamille; ?>" id="adresse" name="adresse" class="input-mask-id" type="text" placeholder="Adiresy"></td>
                                                        <td><input required="required" class="col-xs-8 col-sm-11" value="<?php echo $Ville; ?>" id="ville" name="ville" class="input-mask-id" type="text" placeholder="Tanana"></td>
                                                        <td><input required="required" class="col-xs-8 col-sm-11" value="<?php echo $CodePostal; ?>" id="codepostale" name="codepostale" class="input-mask-id" type="text" placeholder="kaody postaly"></td>
                                                        <td><input required="required" class="col-xs-8 col-sm-11" value="<?php echo $CodePays; ?>" id="codepays" name="codepays" class="input-mask-id" type="text" placeholder="Toerana"></td>
                                                        <td><input required="required" class="col-xs-8 col-sm-11" value="<?php echo  $Telephone; ?>" id="phone" name="phone" class="input-mask-id" type="text" placeholder="Finday"></td>
                                                        <td><input required="required" class="col-xs-8 col-sm-11" value="<?php echo $Email; ?>" id="mail" name="mail" class="input-mask-id" type="text" placeholder="Mailaka"></td>

                                                    </tr>
                                                    </tbody>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="hr hr-18 dotted hr-double"></div>
            <div class="row">
            <div class="col-sm-12 col-xs-11">
                <div class="row">
                    <div class="col-sm-12" >
                        <div class="widget-box">
                            <div class="widget-header">
                                <h4>&nbsp;&nbsp;&nbsp;</h4>
                                <div class="widget-toolbar">
                                <span class="label label-lg label-success arrowed-right">
                                                           <i class="icon-warning-sign bigger-120"></i>
                                                            Mpikambana ao amin'ny fianakaviana
                                        </span><!--
                                <a href="#" class="btn btn-xs btn-light add_field_button">
                                    <i class="icon-plus-sign bigger-120"></i>
                                    hanampy
                                </a>&nbsp;-->
                                </div>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                    <div class="input_fields_wrap">
                                        <div>
                                            <label for="form-field-select-4">Safidio ny mpikambana ... &nbsp;&nbsp;</label>
                                            <select multiple="" name="membre[]" class="width-80 chosen-select" id="form-field-select-4" data-placeholder="Safidio eto ny Mpikambana ao amin'ny fianakaviana, atomboka amin'ny loham-pianakaviana..." style="display: none; ">
                                                <?php \controllers\MembreController::loadOptionMembre(); ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>

        <?php $listMembreParFamille = (isset($listMembreByIdFamille) && !empty($listMembreByIdFamille)) ? $listMembreByIdFamille : 0;?>
        <?php if($listMembreParFamille > 0) : ?>

            <div class="row">
                <div class="col-sm-12 col-xs-11">
                    <div class="row">
                        <div class="col-sm-12" >
                            <div class="widget-box">
                                <div class="widget-header">
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <table border="1" style="border-collapse ; width: 100%;" >
                                            <thead>
                                                <th width="20%">Laharana</th>
                                                <th> Anarana </th>
                                            </thead>
                                            <tbody>
                                            <?php foreach($listMembreParFamille as $l): ?>
                                            <tr><td width="20%"><?php echo $l->getNumeroMembre();?></td><td><?php echo $l->getNomMembre().' '. $l->getPrenomMembre(); ?></td></tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>
    </div>
</div>

<?php include_once "footer.php"; ?>
