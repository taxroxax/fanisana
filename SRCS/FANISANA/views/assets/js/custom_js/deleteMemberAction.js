/**
 * Created by RAJAONARILALA on 09/09/18.
 */
/**
 * Created by RAJAONARILALA on 15/05/18.
 */
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//server host:
var server = $("#server").val();
console.log(server);

function deleteMembres() {
    var id_membre = $("#btn_delete_idMembre").val();
    console.log(id_membre);
    if (id_membre != null){
            $.ajax({
                url: "http://" + server + "/ANOSIZATO/srcs/FANISANA/controllers/ActionMembreController.php",
                data: "action=delete&id_membre=" + id_membre,
                type: 'POST',
                success: function (data) {
                    if (data == 'danger') {
                        document.location = "http://" + server + "/ANOSIZATO/srcs/FANISANA/views/membre.php?message=Voafafa tsy ho mpikambana intsony&class=" + data;
                    }
                }, error: function (xhr, status, error) {
                    console.log(xhr);
                }
            });

    }else{
        document.location = "http://" + server + "/ANOSIZATO/srcs/FANISANA/views/membre.php?message=safidio ny olona ho fafana";
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

$('#btn_delete').on('click',function(){
    console.log('lol');
    $( "#dialog-confirm" ).removeClass('hide').dialog({
        resizable: false,
        modal: true,
        title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i> Famafana </h4></div>",
        title_html: true,
        buttons: [
            {
                html: "<i class='icon-trash bigger-110'></i>&nbsp; Eny",
                "class" : "btn btn-danger btn-xs",
                click: function() {
                    deleteMembres();
                }
            }
            ,
            {
                html: "<i class='icon-remove bigger-110'></i>&nbsp; Tsia",
                "class" : "btn btn-xs",
                click: function() {
                    document.location = "http://" + server + "/ANOSIZATO/srcs/FANISANA/views/membre.php";
                }
            }
        ]
    });
});






function loadInfoMembre(id_membre_to_edit){
    if (id_membre_to_edit != null){
        $.ajax({
            url: "http://" + server + "/ANOSIZATO/srcs/FANISANA/controllers/ActionMembreController.php",
            data: "action=edit&id_membre_to_edit=" + id_membre_to_edit,
            type: 'POST',
            success: function (data) {
                var numeros = JSON.parse(data);
                console.log(numeros);
                $("#num_carte").val(numeros['numero']);
                $("#nom_membre").val(numeros['nom']);
                $("#prenom_membre").val(numeros['prenom']);
            }, error: function (xhr, status, error) {
                console.log(xhr);
            }
        });

    }
}




$( "#btn_edit" ).on('click', function(e) {
    e.preventDefault();

    var id_membre_to_edit = $("#btn_edit_idMembre").val();
    console.log(id_membre_to_edit);
    $("#edit_id_membre").val(id_membre_to_edit);
    loadInfoMembre(id_membre_to_edit);

    var dialog = $( "#dialog-message" ).removeClass('hide').dialog({

        modal: true,
        title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='icon-ok'></i>Mikasika ny mpikambana</h4></div>",
        title_html: true,
        buttons: [
            {
                text: "Cancel",
                "class" : "btn btn-xs",
                click: function() {
                    $( this ).dialog( "close" );
                }
            },
            {
                text: "OK",
                "class" : "btn btn-primary btn-xs",
                click: function() {
                    $( this ).dialog( "close" );
                }
            }
        ]
    });

    /**
     dialog.data( "uiDialog" )._title = function(title) {
						title.html( this.options.title );
					};
     **/
});
