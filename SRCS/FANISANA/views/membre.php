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

    <div class="hr dotted"></div>
    <div class="page-content">
        <div class="page-header">
            <a href="membre.php">
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
                                    <?php
                                    $message = '';
                                    if(isset($_GET['message']) and !empty($_GET['message'])){?>
                                        <span class="label label-lg label-warning arrowed-right">
                                                            <i class="icon-warning-sign bigger-120"></i>
                                            <?php
                                            $message = $_GET['message'];
                                            echo $message;
                                            ?>
                                        </span>

                                    <?php } ?>
                                        <span class="label label-lg label-success arrowed-right">
                                                            <i class="icon-warning-sign bigger-120"></i>
                                                            Hanampy mpikambana
                                        </span>
                                    <a href="new_membre.php" class="btn btn-xs btn-light">
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
