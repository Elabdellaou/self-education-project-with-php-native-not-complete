<?php
$err = isset($_GET['er']) ? 'danger' : 'nor';
$alert_style = isset($_GET['er']) ? 'show' : 'hide';
$mode = (isset($_COOKIE['dark-mode']) && !empty($_COOKIE['dark-mode'])) ? $_COOKIE['dark-mode'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password</title>
    <link rel="stylesheet" href="../Links/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Links/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Links/css/all.min.css">
    <script src="../Source/js/jQuery/node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/login1.css">
    <link rel="stylesheet" href="../css/Forgot_password1.css">
</head>

<body class="w-100 vh-100 d-flex justify-content-center align-items-center <?= $mode ?>">
    <div class="content w-75 h-75 bg-white position-relative" id="content" style="overflow: hidden;">
        <div class="sign-in-sign-up position-absolute">
            <div class="header px-5 pt-3 w-100 d-flex flex-row justify-content-between">
                <a class="logo fs-5 shadow-primary-input" style="font-weight: 510;" href="home.php">
                    <span class="text-nor fs-4 fw-bold">Self</span>Education
                </a>
                <div class="checkbox-div fw-bold fs-4 rounded-circle d-flex align-items-center justify-content-center">
                    <label for="#checkbox-mode" class=" d-flex align-items-center justify-content-center">
                        <input type="checkbox" name="" id="checkbox-mode" style="display: none;">
                        <div class="icon">
                            <i class="bi bi-brightness-high-fill"></i>
                        </div>
                    </label>
                </div>
            </div>
            <div class="sign-in w-100 position-absolute start-50 top-50 translate-middle">
                <div class="w-50 h-100 d-flex flex-column">
                    <h1 class="mb-4 fw-bold text-start text-nor fs-4 mb-5 title position-relative">Password recovery</h1>
                    <div class="alert alert-danger alert-dismissible fade <?= $alert_style; ?>" role="alert">
                        <strong>Error!</strong> The email field is not a valid e-mail address.
                    </div>
                    <p class="mb-2 fs-6">Enter your account email address to recover your password.</p>
                    <div class="form-input mb-3 position-relative">
                        <input type="email" class=" w-100 h-100 rounded-3 border shadow-primary-input border-<?= $err ?>" id="email_search" name="email_search" placeholder="Email address" autocomplete="off" />
                        <i class="fa-solid fa-envelope position-absolute top-50 translate-middle fs-5 text-<?= $err; ?>" style="left: 7%;"></i>
                    </div>
                    <button class="btn mb-2 btn-lg btn-primary shadow-primary btn-form" id="search_btn">
                        Search
                    </button>
                </div>
            </div>
            <div class="sign-up w-100 position-absolute start-50 top-50 translate-middle">
                <div class="w-50 h-100 d-flex flex-column">
                    <h1 class=" fw-bold text-start text-nor fs-2 mb-5 title position-relative">Reset password</h1>
                    <p class="mb-1 fs-6">You will receive an email to complete the password reset.</p>
                    <p class="mb-1 fs-6 text-nor w-100 text-center" id="aftersend" style="display:none">Send Email</p>
                    <div class=" p-2 bg-light rounded-2" id="result">

                    </div>
                    <button class="btn btn-lg btn-primary shadow-primary btn-form my-2" id="send">
                        Send
                    </button>
                    <a class="btn btn-lg btn-outline-primary shadow-primary " id="Not_you" href="Forgot_password.php">
                        Not you?
                    </a>
                </div>
            </div>
            <p class=" text-muted text-end position-absolute start-50" style="top:93% !important; transform:translateX(-50%)">&copy; 2022 Self Education </p>
        </div>
        <div class="panels position-absolute top-0">
            <div class="panel h-75 panel-right position-absolute top-0">
                <div class="container h-75 d-flex flex-column my-5 align-items-center justify-content-around">
                    <div class="content d-flex flex-column align-items-center">
                        <h3 class="fw-bold fs-2 text-white">Enter password to log in ?</h3>
                        <p class="text-white fs-4">Powerful for developers.<br /> Fast for everyone.</p>
                        <a class="btn btn-outline-light shadow-primary transparent fw-bold" id="sign-up-btn" href="Login.php">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../Links/js/bootstrap.bundle.min.js"></script>
    <script>
        let icon = document.querySelector("label .icon i");
        icon.addEventListener('click', change_mode);

        function change_mode() {
            let data = document.body.classList.toggle("dark-mode") ? 1 : 0;
            document.body.classList.contains("dark-mode") ? icon.classList.replace("bi-brightness-high-fill", "bi-moon-stars-fill", ) : icon.classList.replace("bi-moon-stars-fill", "bi-brightness-high-fill");
            $.ajax({
                method: 'Post',
                url: "../Source/php/Tools/dark-mode.php",
                data: {
                    mode: data,
                },
                success: function(data) {}
            });
        }
        $(document).ready(function() {
            let icon = $("label .icon i");

            let icon_email = $(".form-input i");
            let email = $("#email_search");
            let result = $("#result");
            //load
            email.focus();
            $("body").hasClass("dark-mode") ? replaceClass("bi-brightness-high-fill", "bi-moon-stars-fill") : replaceClass("bi-moon-stars-fill", "bi-brightness-high-fill");
            //replace class icon 
            function replaceClass(firstclass, newclass) {
                icon.removeClass(firstclass);
                icon.addClass(newclass);
            }
            //search account
            //validate
            const re_validate_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i;
            $("#search_btn").on('click', function() {
                if (email.val().match(re_validate_email)) {
                    $.ajax({
                        method: 'Post',
                        url: "../Source/php/Tools/search_compte.php",
                        data: {
                        email: email.val(),
                        },
                        success: function(data) {
                            if(data!=''){
                                result.html(data);
                                $("#content").addClass("send_mode");
                            }
                            else
                                location.replace("/Tools/Forgot_password.php?er");
                        },
                        complete: function() {
                        }
                    });
                } else {
                    email.focus();
                    if($(".alert").hasClass("hide"))
                        replace_class($(".alert"),"hide","show");
                    replace_class(email, "border-nor", "border-danger");
                    replace_class(icon_email, "text-nor", "text-danger");
                    setTimeout(function() {
                        replace_class(email, "border-danger", "border-nor");
                        replace_class(icon_email, "text-danger", "text-nor");
                    }, 1000);
                }
            });
            //send mail
            $("#send").on("click",function(){
                $.ajax({
                    method:"POST",
                    url:"../Source/php/mail/Reset.php",
                    data:{
                        id:$("#id_user").val(),
                        email_reset:$("#email_user").text(),
                        name:$("#name_user").text()
                    },
                    success:function(data){},
                    complete:function(){
                        $("#aftersend").css("display","block");
                        setTimeout(() => {
                            $("#aftersend").css("display","none");
                        }, 2000);
                    }
                });
            })
            function replace_class(element, class_active, new_class) {
                element.removeClass(class_active);
                element.addClass(new_class);
            }
        })
    </script>
</body>

</html>