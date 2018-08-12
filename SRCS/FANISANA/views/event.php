<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 05/07/18
 * Time: 19:41
 */
include_once "header.php";?>

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
        <form action="#" method="post" id="form_add_categorie">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="widget-box">
                            <div class="widget-header">
                                <h4>&nbsp;&nbsp;&nbsp;</h4>
                                <div class="widget-toolbar">
                                    <div id="text-notif-error"></div>
                                    <input type="hidden" id="server_ip" value="<?php echo $_SERVER['HTTP_HOST']; ?>">
                                    <input required="required" type="text" placeholder="hanampy hetsika vaovao" name="nom_categorie" id="nom_categorie">
                                    <input class="btn btn-xs btn-light" type="button" value="Tehirizina" id="form-categ-submit">

                                    <a href="#" data-action="collapse">
                                        <i class="icon-chevron-up"></i>
                                    </a>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <?php if(isset($listEvent) && !empty($listEvent)) : ?>

                                            <div class="table-responsive">
                                                <table id="table_liste_categorie" class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Laharana </th>
                                                        <th>Anarana</th>
                                                        <th></th>
                                                    </tr>
                                                    <tbody>
                                                    <?php foreach ($listEvent as $l) : ?>
                                                        <tr>
                                                            <td><?php echo $l->getIdEventCateg(); ?></td>
                                                            <td><?php echo $l->getLibelleEventCategorie(); ?></td>
                                                            <td></td>
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
        </form>
    </div>
</div>
<?php include_once "footer.php";?>
