function showSuccessNotification(notification = null){
    var noti = 'Thao tác thành công!';
    if (notification != null) {
        noti = notification;
    }
     Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: noti,
            showConfirmButton: false,
            timer: 2000
          });
}

function showErorNotification(notification = null){
    var noti = 'Thao tác thành công!';
    if (notification != null) {
        noti = notification;
    }
     Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: noti,
            showConfirmButton: false,
            timer: 2000
          });
}

function ClearErrorMessage(){
    $('#error-message').remove();
}

function checkLogin() {
    if($("#h_loggedin").val() != '1') {
        openModalLogin(true);
    }
}

function openModalLogin(clear=true){
    if(clear) {
        ClearErrorMessage();
        $('#username').val('');
        $('#password').val('');
    }
    $('#loginmodal').addClass('show-modal1').modal('show');
}