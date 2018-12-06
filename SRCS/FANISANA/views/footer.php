<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 04/07/18
 * Time: 20:02
 */
?>
<!--<script src="../../../../ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>-->

<!-- <![endif]-->

<!--[if IE]>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<![endif]-->

<!--[if !IE]> -->

<script type="text/javascript">
    window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

<script type="text/javascript">
    if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/typeahead-bs2.min.js"></script>

<!-- page specific plugin scripts -->

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/jquery.dataTables.bootstrap.js"></script>

<!--[if lte IE 8]>
<script src="assets/js/excanvas.min.js"></script>
<![endif]-->

<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="assets/js/jquery-ui-1.10.3.full.min.js"></script>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="assets/js/chosen.jquery.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/jquery.easy-pie-chart.min.js"></script>
<script src="assets/js/jquery.sparkline.min.js"></script>
<script src="assets/js/flot/jquery.flot.min.js"></script>
<script src="assets/js/flot/jquery.flot.pie.min.js"></script>
<script src="assets/js/flot/jquery.flot.resize.min.js"></script>
<script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>
<script src="assets/js/jquery.maskedinput.min.js"></script>

<!-- ace scripts -->
<!-- page specific plugin scripts -->

<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->

<script type="text/javascript">
        jQuery(function($) {
            var oTable1 = $('#table_liste').dataTable({
                "aoColumns": [
                    {"bSortable": false},
                    {"bSortable": false}
                ]
            });
            var oTable2 = $('#table_liste_membre').dataTable({
                "aoColumns": [
                    {"bSortable": false},
                    null,null,null,null,null,
                    {"bSortable": false}
                ]
            });

            var oTable2 = $('#table_liste_famille').dataTable({
                "aoColumns": [
                    {"bSortable": false},
                    null,null,null,null,null,null,
                    {"bSortable": false}
                ]
            });

            var oTable3 = $('#table_liste_categorie').dataTable({
                "aoColumns": [
                    {"bSortable": false},
                    {"bSortable": false}
                ]
            });



            $('.date-picker').datepicker({autoclose:true}).next().on(ace.click_event, function(){
                $(this).prev().focus();
            });


            $(".chosen-select").chosen();
            $('#chosen-multiple-style').on('click', function(e){
                var target = $(e.target).find('input[type=radio]');
                var which = parseInt(target.val());
                if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
                else $('#form-field-select-4').removeClass('tag-input-style');
            });

            $('.dialogs,.comments').slimScroll({
                height: '300px'
            });

        })
</script>

<script src="assets/js/custom_js/actionControllerCustom.js"></script>

<script src="assets/js/custom_js/deleteMemberAction.js"></script>

<script type="text/javascript">

    $("#form-categ-submit").on('click', function () {
        console.log(sendData());
    })

    $("#send_event").on('click', function (){
        console.log(sendIdEventCategorie());
    })


    $("#form-evenement-submit").on('click', function (){
        console.log(sendInfoEvent());
    })
</script>

</body>

<!-- Mirrored from 192.69.216.111/themes/preview/ace/ by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 14 Nov 2013 12:45:02 GMT -->
</html>