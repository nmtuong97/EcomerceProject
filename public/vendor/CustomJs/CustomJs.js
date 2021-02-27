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
function DeleteErrorMessage(){
    $('#error-message').html('');
}
function returnResultLogIn() {
    return $("#h_loggedin").val();
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

function runlogoff(){
    Swal.fire({
        title: 'Bạn có chắc chắn muốn đăng xuất?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Hủy',
        confirmButtonText: 'Vâng, sẽ đăng xuất'
      }).then((result) => {
        if (result.isConfirmed) {
            $("#frmLogoff").submit();
        }
    });   
}

function addToCart(token,url,frmname,hassize =0,hascolor=0,choosesize=0,choosecolor=0,amount=0,masp = '',idmodal){
//    alert($("#h_hascolor").val());
//    alert($("#h_hassize").val());
    var str = '';
    if(hassize > 0) {
        //san pham co mau sac
        if(choosesize == '') {
            str += '<li>Vui lòng chọn size.</li>';
        }
    }
    if(hascolor > 0) {
        //san pham co mau sac
        if(choosecolor == '') {
            str += '<li>Vui lòng chọn màu sắc.</li>';
        }
    }
    if(amount < 1) {
        str += '<li>Số lượng phải lớn hơn 0.</li>';
    }
    if(str != '') {
        str = '<ul>'+str+'</ul>';
        $("#error-message-cart").html(str);
    } else {
        DeleteErrorMessage();
//        alert('them vao gio thanh cong');
        $('#'+idmodal).removeClass('show-modal1');
        $.ajax({
            type: 'POST',
            url: url,
            data: $('#'+frmname).serialize()+"&_token="+token+'&masp='+masp,
            async: false,
            success: function () {
                showSuccessNotification('Thêm vào giỏ hàng thành công.');
                setTimeout(function(){ 
                    location.reload();  
                }, 2000);
            },
            error: function(data){
                showErorNotification('Thêm vào giỏ hàng không thành công.');
                setTimeout(function(){ 
                    location.reload();  
                }, 2000);
            }
        });
    }
    
}