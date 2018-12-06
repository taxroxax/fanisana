/**
 * Created by RAJAONARILALA on 30/07/18.
 */

function sendData() {
    var nom_categorie = $('#nom_categorie').val();
    console.log(nom_categorie);
    var server = $('#server_ip').val();
    $.ajax({
        url: "http://" + server + "/ANOSIZATO/srcs/FANISANA/controllers/ActionEventCategorieController.php",
        data: "action=Tehirizina&nom_categorie=" + nom_categorie,
        type: 'POST',
        success: function (data) {
            if (data == 'Voatahiry') {
                document.location = 'http://' + server + '/ANOSIZATO/srcs/FANISANA/views/event.php';
            } else {
                $('#text-notif-error').html('<center><label style="color: red;">' + data + '</label></center>');
            }
        }, error: function (xhr, status, error) {
            console.log(xhr);
        }
    });
}

function sendIdEventCategorie(){
    var id_categorie = $('#id_categorie').val();
    var server = $('#server_ip').val();
    $.ajax({
       url: "http://" + server + "ANOSIZATO/srcs/FANISANA/views/participate_event.php",
       data : "action=participate&id_categorie="+ id_categorie,
       type : 'POST'
       /*success : function (data) {
           if (data == 'ok') {
               document.location = 'http://' + server + 'ANOSIZATO/srcs/FANISANA/views/participate_event.php';
           }
       }, error: function (xhr, status, error){
            console.log(xhr);
        }*/
    });
}

function sendInfoEvent() {
    var action = $('#action').val();
    var id_categorie = $('#id_categorie').val();
    console.log(id_categorie);
    var server = $('#server_ip').val();
    console.log(server);
    var lahy = $('#lahy').val();
    console.log(lahy);
    var vavy = $('#vavy').val();
    console.log(vavy);
    var description = $('#description').val();
    console.log(description);
    var place = $('#place').val();
    console.log(place);
    var date_event = $('#date_event').val();
    console.log(date_event);
    var name_event = $('#name_event').val();
    console.log(name_event);
    var DateFiance = $('#DateFiance').val();
    console.log(DateFiance);
    $.ajax({
        url: "http://" + server + "/ANOSIZATO/srcs/FANISANA/controllers/ActionParticipateEvent.php",
        data: "action=" + action + "&id_categorie=" + id_categorie + "&lahy=" + lahy + "&vavy=" + vavy + "&description=" + description + "&place=" + place + "&date_event=" + date_event + "&name_event=" + name_event + "&DateFiance=" + DateFiance,
        type: 'POST',
        success: function (data) {
            console.log(data);
            if (data == 'Voatahiry') {
                document.location = 'http://' + server + '/ANOSIZATO/srcs/FANISANA/views/participate_event.php';
            } else {
                $('#text-notif-error').html('<center><label style="color: red;">' + data + '</label></center>');
            }
        }, error: function (xhr, status, error) {
            console.log(status);
        }
    });
}