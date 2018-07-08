<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 07/07/18
 * Time: 10:02
 */
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
                $(wrapper).append('<div class="widget-main"><div class="table-responsive"><table id="" class="table table-striped table-bordered table-hover"><thead><tr><th>N° Karatra</th><th>Anarana sy Fanampiny</th><th>Taona,Toerana Nahaterahana</th><th>L / V</th></tr><tbody><tr><td><input required="required" class="col-xs-8 col-sm-11" id="NumeroMembre" name="NumeroMembre[]" class="input-mask-idmembre" type="text" placeholder="Laharan-karatra vaovao"><br><br>Loham-pianakaviana : <select class="" name="chefFamille[]"><option value="non">Tsia</option><option value="oui" >Eny</option></select></td><td><input required="required" class="col-xs-8 col-sm-11" id="NomMembre" name="NomMembre[]" type="text" placeholder="Anarana" ><br><br><input required="required" class="col-xs-8 col-sm-11" id="PrenomMembre" name="PrenomMembre[]" type="text" placeholder="Fanampiny"></td><td><div style="width: 76%"><div class="row"><div class="col-xs- col-sm-11"><div class="input-group"><input required="required" name="datenaiss_membre[]"  placeholder="Nahaterahana" class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" /><span class="input-group-addon"><i class="icon-calendar bigger-110"></i></span></div></div></div></div><br><input required="required" class="col-xs-8 col-sm-11" style="width: 70%" id="LieuNaissance" name="LieuNaissance[]" type="text" placeholder="Toerana Nahaterahana"></td><td><select required="required" id="GenderMembre" name="GenderMembre[]" class="form-control" id="form-field-select-1"><option value="Lahy">Lahy</option><option value="Vavy">Vavy</option><select></td></tr></tbody></thead></table></div><a href="#" class="remove_field btn btn-info">Manala</a></div>'); //add input box
            }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('.widget-main').remove(); x--;
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
            <li class="active">MPIKAMBANA</li>
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
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="widget-box">
                            <form name="hanampy" action="../controllers/ActionMembreController.php" method="post">
                            <div class="widget-header">
                                <h4>&nbsp;&nbsp;&nbsp;</h4>
                                <div class="widget-toolbar">
                                        <span class="label label-lg label-success arrowed-right">
                                                            <i class="icon-warning-sign bigger-120"></i>
                                                            Tsindrio ity raha hanampy fanoratana vaovao ianao
                                        </span>
                                    <a href="#" class="btn btn-xs btn-light add_field_button">
                                        <i class="icon-plus-sign bigger-120"></i>
                                        hanampy
                                    </a>&nbsp;

                                    <a href="#" data-action="collapse">
                                        <i class="icon-chevron-up"></i>
                                    </a>
                                </div>
                                <div class="widget-body input_fields_wrap">
                                    <div class="widget-main">
                                        <!--table hanapy-->
                                        <div class="table-responsive">
                                            <table id="" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th>N° Karatra</th>
                                                    <th>Anarana sy Fanampiny</th>
                                                    <th>Taona,Toerana Nahaterahana</th>
                                                    <th>L / V</th>
                                                </tr>
                                                <tbody>
                                                <tr>
                                                    <td><input required="required" class="col-xs-8 col-sm-11" id="NumeroMembre" name="NumeroMembre[]" class="input-mask-idmembre" type="text" placeholder="Laharan'ny karatra vaovao"><br><br>
                                                        Loham-pianakaviana : <select class="" name="chefFamille[]"><option value="non">Tsia</option><option value="oui" >Eny</option></select>
                                                    </td>
                                                    <td><input required="required" class="col-xs-8 col-sm-11" id="NomMembre" name="NomMembre[]" type="text" placeholder="Anarana" ><br><br>
                                                        <input required="required" class="col-xs-8 col-sm-11" id="PrenomMembre" name="PrenomMembre[]" type="text" placeholder="Fanampiny"></td>
                                                    <td>
                                                        <div style="width: 76%">
                                                            <div class="row">
                                                                <div class="col-xs- col-sm-11">
                                                                    <div class="input-group">
                                                                        <input required="required" name="datenaiss_membre[]"  placeholder="Nahaterahana" class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" />
                                                                                <span class="input-group-addon">
                                                                                    <i class="icon-calendar bigger-110"></i>
                                                                                </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><br>
                                                        <input required="required" class="col-xs-8 col-sm-11" style="width: 70%" id="LieuNaissance" name="LieuNaissance[]" type="text" placeholder="Toerana Nahaterahana"></td>
                                                    <td>
<!--                                                        <label>-->
<!--                                                            <input id="GenderMembre" name="GenderMembre[]" type="radio" class="ace" />-->
<!--                                                            <span class="lbl">Lahy</span>-->
<!--                                                        </label><br><br>-->
<!--                                                        <label>-->
<!--                                                            <input id="GenderMembre" name="GenderMembre[]" type="radio" class="ace" />-->
<!--                                                            <span class="lbl">Vavy</span>-->
<!--                                                        </label>-->
                                                        <select required="required" id="GenderMembre" name="GenderMembre[]" class="form-control" id="form-field-select-1">
                                                            <option value="Lahy">Lahy</option>
                                                            <option value="Vavy">Vavy</option>
                                                        <select>
                                                    </td>
                                                </tr>
                                                </tbody>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input class="btn-primary" type="submit" name="action" value="Tehirizina" >
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "footer.php"; ?>
