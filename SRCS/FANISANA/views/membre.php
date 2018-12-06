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
    <input type="hidden" id="server" value="<?php echo $_SERVER['HTTP_HOST']; ?>">
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
                <?php
                if(isset($_GET['message']) && !empty($_GET['message'])): ?>
                    <a href="membre.php">
                        <?php $class = isset($_GET['class']) ? $_GET['class'] : "success";?>
                        <div class="alert alert-block alert-<?php echo $class; ?>">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="icon-remove"></i>
                            </button>

                            <i class="icon-ok red"></i>

                            <strong class="red">
                                <?php echo $message = $_GET['message']; ?>
                            </strong>
                        </div>
                    </a>

                <?php endif;
                ?>
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

                                                            <td>
                                                                <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                                    <button class="btn btn-xs btn-success" id="btn_loop">
                                                                        <i class="icon-zoom-in bigger-120"></i>
                                                                        <input type="hidden" id="btn_loop_idMembre" value="<?php echo $l->getIdMembre(); ?>">
                                                                    </button>
                                                                    <button class="btn btn-xs btn-info" id="btn_edit">
                                                                        <i class="icon-edit bigger-120"></i>
                                                                        <input type="hidden" id="btn_edit_idMembre" value="<?php echo $l->getIdMembre(); ?>">
                                                                    </button>
                                                                    <button class="btn btn-xs btn-danger" id="btn_delete">
                                                                        <i class="icon-trash bigger-120"></i>
                                                                        <input type="hidden" id="btn_delete_idMembre" value="<?php echo $l->getIdMembre(); ?>">
                                                                    </button>
                                                                </div>

                                                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                                                    <div class="inline position-relative">
                                                                        <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                                                                            <i class="icon-cog icon-only bigger-110"></i>
                                                                        </button>

                                                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                                            <li>
                                                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
                                                                                </a>
                                                                            </li>

                                                                            <li>
                                                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
                                                                                </a>
                                                                            </li>

                                                                            <li>
                                                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
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
<!-- #dialog-message -->

<div id="dialog-confirm" class="hide">
    <div class="alert alert-info bigger-110">
        Esorina tsy ho mpikambana tokoa ve izy?
        <span id="text-notif-delete">  </span>
    </div>

    <div class="space-6"></div>

    <p class="bigger-110 bolder center grey">
        <i class="icon-hand-right blue bigger-120"></i>
        Eny sa Tsia?
    </p>
</div>

<div id="dialog-message" class="hide">
    <input type="hidden" id="edit_id_membre" name="edit_id_membre">
    Laharan'ny karatra:
    <input type="text" id="num_carte" name="num_carte" readonly="true">
    <p>
    Anarana :
    <input type="text" id="nom_membre" name="nom_membre"><br>
    Fanampiny :
    <input type="text" id="prenom_membre" name="prenom_membre">
    </p>

    <div class="hr hr-12 hr-double"></div>

    <p>
        ireo lo
        <b>ovaina</b>
        .
    </p>
</div>

<?php include_once "footer.php"; ?>
