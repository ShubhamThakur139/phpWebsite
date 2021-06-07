$(document).ready(function(){
    // Ajax Call Form Already exists Email Verification
    $('#studSignUpEmail').on("keypress blur", function(){
        let regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        let studSignUpEmail = $('#studSignUpEmail').val();
        $.ajax({
            url: "studentRecord/addstudent.php",
            method: 'POST',
            data: {
                checkemail: "checkemail",
                studSignUpEmail: studSignUpEmail,
            },
            success:function(data){
                // console.log(data);
                if(data != 0){
                    $('#statusmsg2').html('<small style="color:red;">Email already exists !</small>');
                    $('#studSignUpBtn').attr("disabled",true);
                }else if(data == 0 && regex.test(studSignUpEmail)){
                    $('#statusmsg2').html('<small style="color:green;">There you go !</small>');
                    $('#studSignUpBtn').attr("disabled",false);
                }else if(!regex.test(studSignUpEmail)){
                    $('#statusmsg2').html('<small style="color:red;">Please Enter Valid Email e.g. abc@gmail.com</small>');
                    $('#studSignUpBtn').attr("disabled",true);
                }
                if(studSignUpEmail.trim() == ""){
                    $('#statusmsg2').html('<small style = "color:red;">Please Enter Email !</small>');
                }
            }
        });
    });
});


//Student Sign up when submit details in sign up form
function addStud(){
    let regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    let studSignUpName = $("#studSignUpName").val();
    let studSignUpEmail = $("#studSignUpEmail").val();
    let studSignUpPassword = $("#studSignUpPassword").val();

    // Checking sign up form fields 
    if(studSignUpName.trim() == ""){
        $('#statusmsg1').html('<small style="color:red;">Please Enter Name !</small>');
        $('#studSignUpName').focus();
        return false;
    }else if(studSignUpEmail.trim() == ""){
        $('#statusmsg1').html(" ");
        $('#statusmsg2').html('<small style="color:red;">Please Enter Email !</small>');
        $('#studSignUpEmail').focus();
        return false;
    }else if(studSignUpEmail.trim() != "" && !regex.test(studSignUpEmail)){
        $('#statusmsg2').html('<small style="color:red;">Please Enter Valid Email e.g. abc@gmail.com</small>');
        $('#studSignUpEmail').focus();
    }else if(studSignUpPassword.trim() == ""){
        $('#statusmsg2').html(" ");
        $('#statusmsg3').html('<small style="color:red;">Please Enter Password !</small>');
        $('#studSignUpPassword').focus();
        return false;
    }else {
        $.ajax({
            url:'studentRecord/addstudent.php',
            method: 'POST',
            dataType: "json",
            data:{
                studSignUp: "studSignUp",
                studSignUpName: studSignUpName,
                studSignUpEmail: studSignUpEmail,
                studSignUpPassword: studSignUpPassword,
            },
            success:function(data){
                console.log(data)
                if(data == "OK"){
                    $('#successMsg').html("<span class ='alert alert-success'>Registration Successfully !</span>");
                    clearStudSignUpField();
                }else if(data == "Failed"){
                    $('#successMsg').html("<span class='alert alert-danger'>Unable to Register</span>");
                }
            }
        })
    }
}


// Ajax call for student login verification 

function logStud(){
    let regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    let studLoginEmail = $('#studLoginEmail').val();
    let studLoginPassword = $('#studLoginPassword').val();

    //check loginFields not empty or valid email
    if(studLoginEmail.trim() == ""){
        $('#logstatusmsg1').html('<small style = "color:red;">Please Enter Email !</small>');
        $('#studLoginEmail').focus();
        return false;
    }else if(!regex.test(studLoginEmail)){
        $('#logstatusmsg1').html('<small style= "color:red; ">Enter Valid Email !</small>');
        $('#studLoginEmail').focus();
        return false;
    }else if(studLoginPassword.trim() == ""){
        $('#logstatusmsg1').html(" ");
        $('#logstatusmsg2').html('<small style = "color:red;">Please Enter Password !</small>');
        $('#studLoginPassword').focus();
        return false;
    }else{
        $.ajax({
            url: 'studentRecord/addstudent.php',
            method: 'POST',
            dataType: "json",
            data:{
                studLoginUp : "studLoginUp",
                studLoginEmail : studLoginEmail,
                studLoginPassword : studLoginPassword,
            },
            success:function(data){
                console.log(data);
                if(data == 1){
                    // $('#logsuccessmsg').html('<span class="alert alert-success">Login Successfully !</span>');
                    $('#logsuccessmsg').html(
                        '<div class="spinner-border text-success" role="status"></div>'
                    );
                    setTimeout(() => {
                        window.location.href = "index.php";
                    },1000);
                    // clearStudLoginField();
                }else if(data == 0){
                    $('#logsuccessmsg').html('<span class="alert alert-danger">Invalid Email or Password!</span>');
                    clearStudLoginField();
                }
            }
        })
    }
}


// Empty Sign Up Form Fields
function clearStudSignUpField(){
    $('#studentSignUpForm').trigger("reset");
    $('#statusmsg1').html(" ");
    $('#statusmsg2').html(" ");
    $('#statusmsg3').html(" ");
}

// Empty Login Form Fields
function clearStudLoginField(){
    $('#studentLoginForm').trigger("reset");
    $('#logstatusmsg1').html(" ");
    $('#logstatusmsg2').html(" ");
}

