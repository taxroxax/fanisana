/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function checkUser() {
    var login = $('#login').val();
    var password = $('#password').val();
    var server = $('#server_ip').val();
    $.ajax({
        url: "http://" + server + "/TECNO_APP/controllers/UsersController.php",
        data: "action=connect&login=" + login + "&password=" + password,
        type: 'POST',
        success: function (data) {
            if (data == 'session_begin') {
                document.location = 'http://' + server + '/TECNO_APP/views/index.php';
            } else {
                $('#text-notif-login').html('<center><label style="color: red;">' + data + '</label></center>');
            }
        }, error: function (xhr, status, error) {
            console.log(xhr);
        }
    });
}