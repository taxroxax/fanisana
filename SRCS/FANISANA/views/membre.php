<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 04/07/18
 * Time: 22:59
 */
require(dirname(__DIR__).'\controllers\MembreController.php');
$list = \controllers\MembreController::LoadAllMembre();
require(dirname(__DIR__).'\controllers\FamilleController.php');
$listFamille = \controllers\FamilleController::LoadAllFamille();
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
            <li class="active">MPIKAMBANA</li>
        </ul>
        <!-- .breadcrumb -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <a href="#">
                <h1>
                    Lisitry ny mpikambana
                </h1>
            </a>
        </div><!-- /.page-header -->
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="widget-box">
                            <div class="widget-header">
                                <h4>&nbsp;&nbsp;&nbsp;</h4>
                                <div class="widget-toolbar">
                                        <span class="label label-lg label-success arrowed-right">
                                                            <i class="icon-warning-sign bigger-120"></i>
                                                            Ekena fa raisina ho Mpikambana
                                        </span>
                                    <a target="_blank" href="#" class="btn btn-xs btn-light">
                                        <i class="icon-plus-sign bigger-120"></i>
                                        Tehirizina
                                    </a>&nbsp;

                                    <a href="#" data-action="collapse">
                                        <i class="icon-chevron-up"></i>
                                    </a>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <!--table lisitra-->


                                            <div class="table-responsive">
                                                <table id="" class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>N° Karatra, Fianakaviana</th>
                                                        <th>Anarana sy Fanampiny</th>
                                                        <th>Taona,Toerana Nahaterahana</th>
                                                        <th>L / V</th>
                                                        <th>Loham-pianakaviana</th>
                                                    </tr>
                                                    <tbody>
                                                        <tr>
                                                            <td><input class="col-xs-8 col-sm-11" id="NumeroMembre" name="NumeroMembre" class="input-mask-idmembre" type="text" placeholder="Laharan'ny karatra vaovao"><br><br>
                                                            	<input class="col-xs-8 col-sm-11" id="tags" name="IdFamille" type="text" placeholder="Laharan'ny fianakaviana">

                                                            </td>
                                                            <td><input class="col-xs-8 col-sm-11" id="NomMembre" name="NomMembre" type="text" placeholder="Anarana" ><br><br>
                                                                <input class="col-xs-8 col-sm-11" id="PrenomMembre" name="PrenomMembre" type="text" placeholder="Fanampiny"></td>
                                                            <td>
                                                                <div style="width: 76%">
                                                                    <div class="row">
                                                                        <div class="col-xs- col-sm-11">
                                                                            <div class="input-group">
                                                                                <input name="datenaiss_staff"  placeholder="Nahaterahana" class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" />
                                                                                <span class="input-group-addon">
                                                                                    <i class="icon-calendar bigger-110"></i>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div><br>
                                                                <input class="col-xs-8 col-sm-11" style="width: 70%" id="LieuNaissance" name="LieuNaissance" type="text" placeholder="Toerana Nahaterahana"></td>
                                                            <td>
                                                                <label>
                                                                    <input id="GenderMembre" name="GenderMembre" type="radio" class="ace" />
                                                                    <span class="lbl">Lahy</span>
                                                                </label><br><br>
                                                                <label>
                                                                    <input id="GenderMembre" name="GenderMembre" type="radio" class="ace" />
                                                                    <span class="lbl">Vavy</span>
                                                                </label>
                                                            </td>
                                                            <td class="col-xs-2 col-sm-1">
                                                                <input id="StatusMembre" name="StatusMembre" class="ace ace-switch ace-switch-3" type="checkbox" />
                                                                <span class="lbl"></span>
                                                            </td>
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
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="widget-box">
                            <div class="widget-header">
                                <h4>&nbsp;&nbsp;&nbsp;</h4>
                                <div class="widget-toolbar">
                                        <span class="label label-lg label-success arrowed-right">
                                                            <i class="icon-warning-sign bigger-120"></i>
                                                            Hanampy mpikambana
                                        </span>
                                    <a target="_blank" href="#" class="btn btn-xs btn-light">
                                        <i class="icon-plus-sign bigger-120"></i>
                                        Vaovao
                                    </a>&nbsp;

                                    <a href="#" data-action="collapse">
                                        <i class="icon-chevron-up"></i>
                                    </a>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <!--table lisitra-->
                                        <?php if(isset($list) && !empty($list)) : ?>

                                            <div class="table-responsive">
                                                <table id="table_liste_membre" class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Karatra N°</th>
                                                        <th>Anarana</th>
                                                        <th class="hidden-xs">Taona,Toerana Nahaterahana</th>
                                                        <th class="hidden-xs" >L / V</th>
                                                        <th class="hidden-xs" >Loham-pianakaviana</th>
                                                        <th class="hidden-xs" >Fianakaviana</th>
                                                    </tr>
                                                    <tbody>
                                                    <?php foreach ($list as $l) : ?>
                                                        <tr>
                                                            <td><?php echo $l->getNumeroMembre(); ?></td>
                                                            <td><?php echo $l->getNomMembre() .' '. $l->getPrenomMembre(); ?></td>
                                                            <td class="hidden-xs" ><?php echo date('d M Y',strtotime($l->getDateNaissance())) . ' tao ' .$l->getLieuNaissance() ;  ?></td>
                                                            <td class="hidden-xs" ><?php if($l->getGenderMembre() == 1){ echo "Lehilahy"; }else {echo "Vehivavy"; }  ?></td>
                                                            <td class="hidden-xs" >
                                                            <?php if($l->getStatusMembre()!=null):?>
                                                                <i class="normal-icon icon-user red bigger-130"></i>
                                                            <?php echo " Mpitarika" ; endif; ?></td>
                                                            <td class="hidden-xs" ><?php echo $l->getIdFamille(); ?></td>
                                                        </tr>
                                                    <?php endforeach;?>
                                                    </tbody>
                                                    </thead>
                                                </table>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "footer.php"; ?>
