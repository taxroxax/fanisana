/**
 * Created by RAJAONARILALA on 15/05/18.
 */
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function deleteSales() {
    var id_sales = new Array();
     $("input:checkbox[name=supprimer]:checked").each(function(){
        id_sales.push($(this).val());
     });
    var id_sales_length = id_sales.length;
    if (id_sales_length != null){
            for(i=0;i<id_sales_length;i++){
                var id_sales_end = id_sales[i];
                $.ajax({
                    url: "http://localhost/TECNO_APP/controllers/ActionSalesController.php",
                    data: "action=delete&id_sales=" + id_sales_end,
                    type: 'POST',
                    success: function (data) {
                        if (data == 'Delete success') {
                            document.location = 'http://localhost/TECNO_APP/views/list_vente.php?message='+data;
                        }
                    }, error: function (xhr, status, error) {
                        console.log(xhr);
                    }
                });
            }
        }else{
        document.location = 'http://localhost/TECNO_APP/views/list_vente.php?message=select product';
    }
}

//override dialog's title function to allow for HTML titles
$.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
    _title: function(title) {
        var $title = this.options.title || '&nbsp;'
        if( ("title_html" in this.options) && this.options.title_html == true )
            title.html($title);
        else title.text($title);
    }
}));

$( "#id-btn-dialog2" ).on('click', function(e) {
    e.preventDefault();

    $( "#dialog-confirm" ).removeClass('hide').dialog({
        resizable: false,
        modal: true,
        title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i> Empty the recycle bin?</h4></div>",
        title_html: true,
        buttons: [
            {
                html: "<i class='icon-trash bigger-110'></i>&nbsp; Delete all items",
                "class" : "btn btn-danger btn-xs",
                click: function() {
                    deleteSales();
                }
            }
            ,
            {
                html: "<i class='icon-remove bigger-110'></i>&nbsp; Cancel",
                "class" : "btn btn-xs",
                click: function() {
                    document.location = 'http://localhost/TECNO_APP/views/list_vente.php';
                }
            }
        ]
    });
});
