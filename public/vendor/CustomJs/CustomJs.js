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
//    alert('check login '+$("#h_loggedin").val());
    if($("#h_loggedin").val() != '1') {
        
        $(".show-modal1").each(function(){
            $(this).removeClass("show-modal1");
        });
        
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