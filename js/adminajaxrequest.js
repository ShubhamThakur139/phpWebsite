
// Admin Login code 
function adminLog(){
    console.log('Admin');
    let regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    let adminLoginEmail = $('#adminLoginEmail').val();
    let adminLoginPassword = $('#adminLoginPassword').val();

    if(adminLoginEmail.trim() == ""){
        $('#admstatusmsg1').html('<small style="color:red;">Enter Admin Email !</small>');
        $('#adminLoginEmail').focus();
    }else if(!regex.test(adminLoginEmail)) {
        $('#admstatusmsg1').html('<small style="color:red;">Invalid Email !</small>')
        $('#adminLoginEmail').focus();
    }else if(adminLoginPassword.trim() == ""){
        $('#admstatusmsg2').html('<small style="color:red;">Enter Password !</small>');
        $('#admstatusmsg1').hide();
        $('#adminLoginPassword').focus();
    }else {
        $.ajax({
            url: 'Admin/admin.php',
            method: 'POST',
            dataType: 'json',
            data: {
                adminLogin : "adminLogin",
                adminLoginEmail : adminLoginEmail,
                adminLoginPassword : adminLoginPassword,
            },success:function(data){
                console.log(data);
                if(data === 0){
                    $('#admstatusmsg3').html('<span class="alert alert-danger">Invalid Email or Password !</span>')
                    clearAdmLoginField();
                }else if(data === 1 || data === "Login"){
                    $('#admstatusmsg3').html(
                        '<div class="spinner-border text-success" role="status"></div>'
                    );
                    setTimeout(() => {
                        window.location.href = "Admin/Dashboard.php";
                    },1000);
                    clearAdmLoginField();
                }
                // else if(data === "Login"){
                //     $('#admstatusmsg3').html('<span class="alert alert-danger">Already Login</span>')
                // }
            }
        });
    }
}

// Empty Admin Login fields 
function clearAdmLoginField(){
    $('#adminLoginForm').trigger("reset");
    $('#admstatusmsg1').hide();
    $('#admstatusmsg2').hide();
}