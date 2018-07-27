<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 05/07/18
 * Time: 19:41
 */
include_once "header.php";?>

<?php
require(dirname(__DIR__).'\controllers\EventCategorieController.php');
$list = \controllers\EventCategorieController::LoadEventCategorie();
?>

<div class="main-content">
    <div class="breadcrumb" id="breadcrumbs">
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
            <li class="active">HETSIKA</li>
        </ul>
        <!-- .breadcrumb -->
    </div>
    <div class="page-content">
        <div class="page-header" >
            <a href="#">
                <h1>
                    Lisitry ny hetsika
                </h1>
            </a>
        </div><!--page header-->
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="widget-box">
                            <div class="widget-header">
                                <h4>&nbsp;&nbsp;&nbsp;</h4>
                                <div class="widget-toolbar">
                                    <a href="#" data-action="collapse">
                                        <i class="icon-chevron-up"></i>
                                    </a>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <?php if(isset($list) && !empty($list)) : ?>

                                            <div class="table-responsive">
                                                <table id="table_liste_categorie" class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Laharana </th>
                                                        <th>Anarana</th>
                                                    </tr>
                                                    <tbody>
                                                    <?php foreach ($list as $l) : ?>
                                                        <tr>
                                                            <td><?php echo $l->getIdEventCateg(); ?></td>
                                                            <td><?php echo $l->getLibelleEventCategorie(); ?></td>
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


<?php include_once "footer.php";?>
