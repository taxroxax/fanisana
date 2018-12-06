<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 30/07/18
 * Time: 15:58
 */
?>

<?php include_once "header.php"; ?>
<?php
require(dirname(__DIR__).'\controllers\MembreController.php');
?>
<?php
    $id_event = (isset($_GET['id_event']) && !empty($_GET['id_event'])) ? $_GET['id_event'] : '';
    $name_event =(isset($_GET['name_event']) && !empty($_GET['name_event'])) ? $_GET['name_event'] : '';
?>
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
            <li class="active"><?php echo $name_event;?></li>
        </ul>
        <!-- .breadcrumb -->
    </div>

    <div class="page-content">
        <div class="page-header" >
            <a href="#">
                <h1>
                    <?php echo $name_event ?>
                </h1>
            </a>
        </div><!--page header-->
<?php if($name_event== 'Mariazy'): ?>
    <form action="#" method="post" id="form_participate_event">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="widget-box">
                            <div class="widget-header header-color-dark">
                                <h6>
                                    Ara-panjakana
                                </h6>

                                <div class="widget-toolbar">
                                    <div id="text-notif-error"></div>
                                    <a href="#" data-action="collapse">
                                        <i class="icon-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <input type="hidden" name="id_categorie" id="id_categorie" value="<?php echo $id_event; ?>"/>
                                        <div>
                                            <label for="lahy">* Anaran'ny Lahy : </label>
                                            <select class="form-control" id="lahy" name="lahy">
                                                <option value="default"> Lahy </option>
                                                <?php  \controllers\MembreController::loadOptionMembreByGender(1); ?>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="vavy">* Anaran'ny vavy :</label>
                                            <select class="form-control" id="vavy" name="vavy">
                                                <option value="default"> Vavy </option>
                                                <?php  \controllers\MembreController::loadOptionMembreByGender(0); ?>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="DateFiance">* Daty nisoratana: </label>
                                            <input  required="required" autocomplete="off" class="form-control col-xs-10 col-sm-1 date-picker" type="text" id="DateFiance" name="DateFiance" >
                                        </div>
                                        <div>
                                            <br><br><br><br>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="widget-box">
                            <div class="widget-header header-color-dark">
                                <h6>
                                    Ara-pinoana
                                </h6>
                                <div class="widget-toolbar">
                                    <div id="text-notif-error"></div>
                                    <input type="hidden" id="server_ip" value="<?php echo $_SERVER['HTTP_HOST']; ?>">
                                    <input type="hidden" id="action" name="action" value = "mariage">
                                    <input type="hidden" id="name_event" name="name_event" value="<?php echo $name_event; ?>">
                                    <input class="btn btn-xs btn-light" type="button" value="Tehirizina" id="form-evenement-submit">
                                    <a href="#" data-action="collapse">
                                        <i class="icon-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                    <div>
                                        <label for="date_event" >Daty nanamasinana: </label>
                                        <input  required="required"  autocomplete="off" class="form-control col-xs-10 col-sm-10 date-picker" type="text" id="date_event" name="date_event" >
                                    </div>

                                    <div>
                                        <label for="place">Toerana nivadina : </label>
                                        <input class="form-control" type="text" id="place" name="place" >
                                    </div>

                                    <div>
                                        <label for="description">Fampahafantarana fohy</label>
                                        <textarea class="form-control" id="description" name="description" placeholder="Fanamarihana"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </form>
<?php endif; ?>
<?php if ($name_event != 'Mariazy'): ?>
    <form action="#" method="post" id="form_participate_event">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="widget-box">
                            <div class="widget-header">
                                <div class="widget-toolbar">
                                    <div id="text-notif-error"></div>
                                    <input type="hidden" id="server_ip" value="<?php echo $_SERVER['HTTP_HOST']; ?>">
                                    <input type="hidden" id="action" name="action" value = "others">
                                    <input type="hidden" id="name_event" name="name_event" value="<?php echo $name_event; ?>">
                                    <input class="btn btn-xs btn-light" type="button" value="Tehirizina" id="form-evenement-submit">
                                    <a href="#" data-action="collapse">
                                        <i class="icon-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                    <input type="hidden" name="id_categorie" id="id_categorie" value="<?php echo $id_event; ?>"/>
                                    <div>
                                        <label for="lahy">Anaran'ny Mpandray anjara : </label>
                                        <select class="form-control" id="lahy" name="lahy">
                                            <option value="default"> Mpandray anjara</option>
                                            <?php  \controllers\MembreController::loadOptionMembre(); ?>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="date_event" >Datin'ny hetsika: </label>
                                        <input required="required"  autocomplete="off" class="form-control col-xs-10 col-sm-10 date-picker" type="text" id="date_event" name="date_event" >
                                    </div>
                                    <input autocomplete="off" class="form-control col-xs-10 col-sm-1" type="hidden" id="DateFiance" name="DateFiance" value="" >
                                    <input type="hidden" id="vavy" name="vavy" value="1" >

                                    <div>
                                        <label for="place">Toerana nanaovana azy : </label>
                                        <input class="form-control" type="text" id="place" name="place" >
                                    </div>
                                    <div>
                                        <label for="description">Fampahafantarana fohy</label>
                                        <textarea class="form-control" id="description" name="description" placeholder="Fanamarihana"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

<?php endif; ?>
</div>
<?php include_once "footer.php"; ?>