<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 07/07/18
 * Time: 12:58
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
            <li class="active">FIANAKAVIANA</li>
        </ul>
        <!-- .breadcrumb -->
    </div>

    <div class="hr dotted"></div>
    <div class="page-content">
        <div class="page-header">
            <a href="famille.php">
                <h1>
                    Lisitry ny fianakaviana
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
                                   <!-- <span class="label label-lg label-success arrowed-right">
                                                            <i class="icon-warning-sign bigger-120"></i>
                                                            Hanampy fianakaviana
                                        </span>
                                    <a href="new_famille.php" class="btn btn-xs btn-light">
                                        <i class="icon-plus-sign bigger-120"></i>
                                        Vaovao
                                    </a>&nbsp;-->

                                    <a href="#" data-action="collapse">
                                        <i class="icon-chevron-up"></i>
                                    </a>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <!--table lisitra-->
                                        <?php if(isset($listFamille) && !empty($listFamille)) : ?>

                                            <div class="table-responsive">
                                                <table id="table_liste_famille" class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Mpitarika N°</th>
                                                        <th>Adiresy</th>
                                                        <th class="hidden-xs">Kaody postaly</th>
                                                        <th class="hidden-xs" >Tanana</th>
                                                        <th class="hidden-xs" >Kaody-tanana</th>
                                                        <th class="hidden-xs" >Finday</th>
                                                        <th class="hidden-xs" >Mailaka</th>
                                                        <th class="hidden-xs" >Faritra</th>
                                                    </tr>
                                                    <tbody>
                                                    <?php foreach ($listFamille as $l) : ?>

                                                        <tr>
                                                            <td><a href="new_famille.php?idChef=<?php echo $l->getIdChefFamille(); ?>"><?php echo $l->getIdChefFamille(); ?>
                                                                </a></td>
                                                            <td><?php echo $l->getAdresseFamille(); ?></td>
                                                            <td class="hidden-xs" ><?php echo $l->getCodePostal() ;  ?></td>
                                                            <td class="hidden-xs" ><?php echo $l->getVille();  ?></td>
                                                            <td class="hidden-xs" ><?php echo $l->getCodePays();  ?></td>
                                                            <td class="hidden-xs" ><?php echo $l->getTelephone();  ?></td>
                                                            <td class="hidden-xs" ><?php echo $l->getEmail();  ?></td>
                                                            <td class="hidden-xs" >
                                                                <?php
                                                                if ($l->getIdQuartier() == null){
                                                                    echo 'FARITRA - ?';
                                                                }else{
                                                                echo 'FARITRA - '. $l->getIdQuartier();
                                                                }
                                                                ?>
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

<?php include_once "footer.php"; ?>
