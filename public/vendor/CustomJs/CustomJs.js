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