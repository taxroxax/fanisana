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

$countFamille = count($listFamille);

include_once "header.php";?>

<script src="assets/customjs/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID

        var x = 0; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="formulaire">Mpikambana<select required="required" id="Quartier" name="Membre[]" id="form-field-select-1"><?php \controllers\MembreController::loadOptionMembre(); ?><select><label><span class="lbl">Filoham-pianakaviana</span><select name="chef"><option value = "0"> Tsia </option><option value = "1"> Eny </option></select></label><a href="#" class="remove_field">Remove</a></div>'); }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('.formulaire').remove(); x--;
        })
    });
</script>

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
                    Hisoratra
                </h1>
            </a>
        </div><!-- /.page-header -->
        <div class="row">
            <div class="col-xs-12">
                <form name="hanampy" action="../controllers/ActionFamilleController.php" method="post">
                    <input type="hidden" value="<?php echo $countFamille+1; ?>" name="id_famille">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="widget-box">

                                <div class="widget-header">
                                    <h4>&nbsp;&nbsp;&nbsp;</h4>
                                    <div class="widget-toolbar">
<!--                                        <span class="label label-lg label-success arrowed-right">-->
<!--                                                            <i class="icon-warning-sign bigger-120"></i>-->
<!--                                                            Tsindrio ity raha hanampy fanoratana vaovao ianao-->
<!--                                        </span>-->
<!--                                        <a href="#" class="btn btn-xs btn-light add_field_button">-->
<!--                                            <i class="icon-plus-sign bigger-120"></i>-->
<!--                                            hanampy-->
<!--                                        </a>&nbsp;-->

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
                                                        <td> <select required="required" id="Quartier" name="Quartier[]" class="form-control" id="form-field-select-1">
                                                                <?php \controllers\QuartierController::loadOptionQuartier(); ?>
                                                                <select>
                                                        </td>
                                                        <td><input required="required" class="col-xs-8 col-sm-11" id="adresse" name="adresse[]" class="input-mask-id" type="text" placeholder="Adiresy"></td>
                                                        <td><input required="required" class="col-xs-8 col-sm-11" id="ville" name="ville[]" class="input-mask-id" type="text" placeholder="Tanana"></td>
                                                        <td><input required="required" class="col-xs-8 col-sm-11" id="codepostale" name="codepostale[]" class="input-mask-id" type="text" placeholder="kaody postaly"></td>
                                                        <td><input required="required" class="col-xs-8 col-sm-11" id="codepays" name="codepays[]" class="input-mask-id" type="text" placeholder="Toerana"></td>
                                                        <td><input required="required" class="col-xs-8 col-sm-11" id="phone" name="phone[]" class="input-mask-id" type="text" placeholder="Finday"></td>
                                                        <td><input required="required" class="col-xs-8 col-sm-11" id="mail" name="mail[]" class="input-mask-id" type="text" placeholder="Mailaka"></td>

                                                    </tr>
                                                    </tbody>
                                                    </thead>
                                                </table>
                                                <div class="input_fields_wrap">
                                                <div class="formulaire">
                                                    Mpikambana
                                                    <select required="required" id="Quartier" name="Membre[]" id="form-field-select-1">
                                                        <?php \controllers\MembreController::loadOptionMembre(); ?>
                                                        <select>
                                                    <label><span class="lbl">Filoham-pianakaviana</span>
                                                        <select name="chef">
                                                            <option value = '0'> Tsia </option>
                                                            <option value = '1'> Eny </option>
                                                        </select>
                                                    </label>
                                                </div>
                                                    <button class="add_field_button">Hanampy</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input class="btn-primary" type="submit" name="action" value="Tehirizina" >
                        </div>
                    </div>
                </div> </form>
            </div>
        </div>
    </div>
</div>

<?php include_once "footer.php"; ?>
