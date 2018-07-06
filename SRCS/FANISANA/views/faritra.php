<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 04/07/18
 * Time: 20:01
 */
require(dirname(__DIR__).'\controllers\QuartierController.php');
$list = \controllers\QuartierController::LoadAllQuartier();
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
                <li class="active">FARITRA</li>
            </ul>
            <!-- .breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <a href="new_staff.php">
                    <h1>
                        Lisitry ny faritra
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
                                                            Hanampy faritra
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
                                                <table id="table_liste" class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Laharana</th>
                                                        <th>Anaran'ny faritra</th>
                                                    </tr>
                                                    <tbody>
                                                    <?php foreach ($list as $l) : ?>
                                                        <tr>
                                                            <td>F-<?php echo $l->getIdQuartier(); ?></td>
                                                            <td><?php echo $l->getLibelleQuartier(); ?></td>
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
