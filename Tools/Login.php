<?php
include('../Source/php/login_facebook/facebook_login.php');
$em=isset($_COOKIE['email'])?$_COOKIE['email']:"";
$pass=isset($_COOKIE['pass'])?$_COOKIE['password']:"";
$err = isset($_GET['err']) ? 'danger' : 'nor';
$alert_style = isset($_GET['err']) ? 'Block' : 'none';
$err_up = isset($_GET['errup']) ? 'danger' : 'nor';
$sign_up_mode = isset($_GET['errup']) ? 'sign-up-mode' : '';
$alert_up_style = isset($_GET['errup']) ? 'Block' : 'none';
$alert_cntent = isset($_GET['errup']) ? 'Email already exists.' : '';
$mode = (isset($_COOKIE['dark-mode']) && !empty($_COOKIE['dark-mode'])) ? $_COOKIE['dark-mode'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Links/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Links/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Links/css/all.min.css">
    <script src="../Source/js/jQuery/node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/login1.css">
</head>

<body class="w-100 vh-100 d-flex justify-content-center align-items-center <?= $mode ?>" onload="upd()">
    <div class="content w-75 h-75 bg-white position-relative <?= $sign_up_mode ?>" style="overflow: hidden;">
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
                <form action="../Source/php/Tools/login.php" method="post" class="w-50 h-100 d-flex flex-column">
                    <h1 class="mb-4 fw-bold text-start text-nor fs-4 mb-<?= isset($_GET['err']) ? 3 : 5; ?> title position-relative">Welcome Back</h1>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display:<?= $alert_style; ?>!important">
                        <strong>Error!</strong> email or password incorrect please try again.
                    </div>
                    <div class="form-input mb-3 <?= $err; ?> position-relative">
                        <input type="email" class=" w-100 h-100 rounded-3 border shadow-primary-input border-<?= $err ?>" id="email_sign_in" name="email_in" value="<?=$em?>" placeholder="Email address" required autocomplete="off" />
                        <i class="fa-solid fa-envelope position-absolute top-50 translate-middle fs-5 text-<?= $err; ?>" style="left: 7%;"></i>
                    </div>
                    <div class="form-input mb-3  position-relative">
                        <input type="password" class="w-100 h-100 rounded-3 border shadow-primary-input border-nor " maxlength="16" id="password_sign_in" value="<?=$pass?>" name="password_in" placeholder="Password" required autocomplete="off" />
                        <i class="fa-solid fa-lock position-absolute top-50 translate-middle text-nor fs-5" style="left: 7%;"></i>
                        <i class="fa-solid fa-eye position-absolute end-0 translate-middle text-nor" style="top:50%;font-size:1rem !important;cursor:pointer;"></i>
                    </div>
                    <div class="checkbox mb-3 ms-1 fs-6 fw-normal">
                        <label>
                            <input type="checkbox" value="on" name="remember_me" id="remember_me"  /> Remember me
                        </label>
                    </div>
                    <button class="btn mb-2 btn-lg shadow-primary btn-form" name="login" type="submit">
                        Log In
                    </button>
                    <p class="mt-1 text-end"><a class="fst-normal fp" href="Forgot_password.php">Forget password?</a></p>
                </form>
            </div>
            <div class="sign-up w-100 h-75 position-absolute start-50 top-50 translate-middle">
                <form action="../Source/php/Tools/Create_Account.php" method="post" class="w-50 h-100 d-flex flex-column">
                    <h1 class="mb-4 fw-bold text-start text-nor fs-2 mb-<?= isset($_GET['errup']) ? 0 : 5; ?> title position-relative">Create Account</h1>
                    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert" style="display:<?= $alert_up_style; ?>!important">
                        <strong>Error! </strong><span><?= $alert_cntent ?></span>
                    </div>
                    <div class="form-input mb-3 position-relative">
                        <input type="text" class="w-100 h-100 rounded-3 shadow-primary-input border border-nor " id="fullname" name="fullname" placeholder="Full name" autocomplete="off" />
                        <i class="fa-solid fa-user position-absolute top-50 translate-middle fs-5 text-nor" style="left: 7%;"></i>
                    </div>
                    <div class="form-input mb-3 position-relative">
                        <input type="email" class=" w-100 h-100 rounded-3 shadow-primary-input border border-<?= $err_up; ?>" id="email" name="email" placeholder="Email address" autocomplete="off" />
                        <i class="fa-solid fa-envelope position-absolute top-50 translate-middle fs-5 text-<?= $err_up ?>" style="left: 7%;"></i>
                    </div>
                    <div class="form-input mb-3 position-relative">
                        <input type="password" class="w-100 h-100 rounded-3 shadow-primary-input border border-nor " maxlength="16" id="password" name="password" placeholder="Password" autocomplete="off" />
                        <i class="fa-solid fa-lock position-absolute top-50 translate-middle fs-5 text-nor" style="left: 7%;"></i>
                        <i class="fa-solid fa-eye position-absolute end-0 translate-middle text-nor" style="top:50%;font-size:1rem !important;cursor:pointer;"></i>
                    </div>
                    <div class="form-input mb-4 position-relative">
                        <input type="password" class="w-100 h-100 rounded-3 shadow-primary-input border border-nor " maxlength="16" id="cpassword" name="cpassword" placeholder="Confirm password" autocomplete="off" />
                        <i class="fa-solid fa-lock position-absolute top-50 translate-middle fs-5 text-nor" style="left: 7%;"></i>
                        <i class="fa-solid fa-eye position-absolute end-0 translate-middle text-nor" style="top:50%;font-size:1rem !important;cursor:pointer;"></i>
                    </div>
                    <button class="btn btn-lg btn-primary shadow-primary btn-form" name="submit" type="submit" onclick="">
                        sign up
                    </button>
                </form>
            </div>
            <p class="text-muted text-end position-absolute start-50" style="top:93% !important; transform:translateX(-50%)">&copy; 2022 Self Education </p>
        </div>
        <div class="panels position-absolute top-0">
            <div class="panel h-75 panel-left position-absolute top-0">
                <div class="container h-75 d-flex flex-column my-5 align-items-center justify-content-around">
                    <div class="content d-flex flex-column align-items-center">
                        <h3 class="fw-bold fs-2 text-white">Already have an account ?</h3>
                        <p class="text-white fs-4">Powerful for developers.<br /> Fsast for everyone.</p>
                        <button class="btn btn-outline-light shadow-primary transparent fw-bold" id="sign-in-btn">Sign in</button>
                    </div>
                    <a class="btn btn-lg btn-primary shadow-primary fs-6 facebook ronded-3" href="<?php echo $facebook_login_url; ?>" style="font-weight: 580;" name="facebook_sign_up">
                        <i class="fa-brands fa-facebook-square fs-5"></i>
                        <span> Sign up <span class="fm">with Facebook</span></span>
                    </a>
                </div>
            </div>
            <div class="panel h-75 panel-right position-absolute top-0">
                <div class="container h-75 d-flex flex-column my-5 align-items-center justify-content-around">
                    <div class="content d-flex flex-column align-items-center">
                        <h3 class="fw-bold fs-2 text-white"> New here ?</h3>
                        <p class="text-white fs-4">Powerful for developers.<br /> Fast for everyone.</p>
                        <button class="btn btn-outline-light shadow-primary transparent fw-bold" id="sign-up-btn">Sign up</button>
                    </div>
                    <a class=" btn btn-lg btn-primary shadow-primary fs-6 rounded-3 facebook" href="<?php echo $facebook_login_url; ?>" style="font-weight: 580;" name="facebook_sign_in">
                        <i class="fa-brands fa-facebook-square fs-5"></i>
                        <span> Sign in <span class="fm">with Facebook</span></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="../Links/js/bootstrap.bundle.min.js"></script>

    <script>
        //variables
        //sign_in
        let container = document.querySelector('.content');
        let form_sign_in = document.querySelectorAll(".sign-in form");
        let inp_sign_in = document.querySelectorAll(".sign-in form input");
        let icon_sign_in = document.querySelectorAll(".sign-in form i")
        //sign_up
        let form_sign_up = document.querySelectorAll(".sign-up form");
        let diver = document.querySelector(".sign-up form .alert.alert-danger");
        let diver_p = document.querySelector(".sign-up form .alert.alert-danger span");
        let inp = document.querySelectorAll(".sign-up form input");
        let icons = document.querySelectorAll(".sign-up form i");
        //panel-right
        let move_sign_up = document.querySelector('#sign-up-btn');
        //panel-left
        let move_sign_in = document.querySelector('#sign-in-btn');
        //icon dark mode
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
        //icons password hide show
        let icon_pass = [icon_sign_in[2], icons[3], icons[5]];
        let input_pass = [inp_sign_in[1], inp[2], inp[3]];
        //fine variables
        //load page
        function upd() {
            document.querySelector("#remember_me").checked = true;
            <?php if(isset($_GET['errup'])){?>
                inp[0].value =window.sessionStorage.getItem('name')? window.sessionStorage.getItem('name'):"";
                inp[1].value =window.sessionStorage.getItem('email')? window.sessionStorage.getItem('email'):"";
                inp[2].value =window.sessionStorage.getItem('pass')? window.sessionStorage.getItem('pass'):"";
                inp[3].value =window.sessionStorage.getItem('confirm_pass')? window.sessionStorage.getItem('confirm_pass'):"";
            <?php } ?>
            document.body.classList.contains("dark-mode") ? icon.classList.replace("bi-brightness-high-fill", "bi-moon-stars-fill") : icon.classList.replace("bi-moon-stars-fill", "bi-brightness-high-fill");
            focuser();
        }
        //fine load 
        //hide show password sign up
        icon_pass.forEach((ele, index) => {
            ele.addEventListener('click', function() {
                if (this.classList.contains("fa-eye")) {
                    this.classList.replace("fa-eye", "fa-eye-slash");
                    input_pass[index].type = "text";
                } else {
                    this.classList.replace("fa-eye-slash", "fa-eye");
                    input_pass[index].type = "password";
                }
            });
        });
        // animation login

        move_sign_up.addEventListener("click", () => {
            container.classList.add("sign-up-mode");
            document.body.classList.add("rotate");
            focuser();
        });

        move_sign_in.addEventListener("click", () => {
            container.classList.remove("sign-up-mode");
            document.body.classList.remove("rotate");
            focuser();
        });
        //fine animation login

        //submit valider
        //validate password 
        const re_validate_password = /^(?=.*\d)(?=.*[a-z])(?=.*[!@#$%^&*]).{8,16}$/i;
        //validate email
        const re_validate_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i;
        //validate name
        const re_validate_name = /^([A-Za-zéàë]{4,30} ?)+$/i;
        //sign_up
        document.forms[1].onsubmit = function(event) {
            let email = false;
            let password = false;
            let confirm_password = false;
            let name = false;
            let error = "";
            let contains_err;
            if (re_validate_name.test(inp[0].value)) {
                name = true;
                inp[0].classList.replace("border-danger", "border-nor");
                icons[0].classList.replace("text-danger", "text-nor");
            } else {
                inp[0].classList.replace("border-nor", "border-danger");
                icons[0].classList.replace("text-nor", "text-danger");
                error = 'Fill in the name (use of special characters is prohibited).';
            }
            if (re_validate_email.test(inp[1].value)) {
                email = true;
                inp[1].classList.replace("border-danger", "border-nor");
                icons[1].classList.replace("text-danger", "text-nor");
            } else {
                contains_err = inp[0].classList.contains('border-danger') ? 1 : 0;
                if (contains_err == 0) {
                    inp[1].classList.replace("border-nor", "border-danger");
                    icons[1].classList.replace("text-nor", "text-danger");
                }
                if (error.length == 0)
                    error = 'example : username@example.com.';
            }
            contains_err = 0;
            if (re_validate_password.test(inp[2].value)) {

                password = true;

                inp[2].classList.replace("border-danger", "border-nor");
                icons[2].classList.replace("text-danger", "text-nor");
                icons[3].classList.replace("text-danger", "text-nor");

            } else {
                contains_err = get_error([inp[0], inp[1], inp[2]]);
                if (contains_err == 0) {
                    inp[2].classList.replace("border-nor", "border-danger");
                    icons[2].classList.replace("text-nor", "text-danger");
                    icons[3].classList.replace("text-nor", "text-danger");

                }
                if (error.length == 0)
                    error = "Please enter a more secure password (more than 8 chars, number and special character).";
            }
            contains_err = 0;
            if (inp[3].value == inp[2].value) {
                confirm_password = true;
                inp[3].classList.replace("border-danger", "border-nor");
                icons[4].classList.replace("text-danger", "text-nor");
                icons[5].classList.replace("text-danger", "text-nor");
            } else {
                contains_err = get_error();
                if (contains_err == 0) {
                    inp[3].classList.replace("border-nor", "border-danger");
                    icons[4].classList.replace("text-nor", "text-danger");
                    icons[5].classList.replace("text-nor", "text-danger");

                }
                if (error.length == 0)
                    error = "Confirm password.";
            }

            if (password == false || confirm_password == false || email == false || name == false) {
                event.preventDefault();
                diver.style.cssText = "display: Block !important;"
                diver_p.textContent = error;
                focuser();
            }else{
                window.sessionStorage.setItem('name',inp[0].value);
                window.sessionStorage.setItem('email',inp[1].value);
                window.sessionStorage.setItem('pass',inp[2].value);
                window.sessionStorage.setItem('confirm_pass',inp[3].value);
            }
        }

        //fine valider
        //focus input

        function focuser() {
            if (document.body.classList.contains("rotate")) {
                let contains_error = get_error();
                if (contains_error == 0) {
                    inp[0].focus();
                }
            } else {
                inp_sign_in[0].focus();
            }
        }
        //fine focus input
        //search contains class error
        function get_error(arr = inp) {
            let i = 0;
            for (ele of arr) {
                if (ele.classList.contains("border-danger")) {
                    ele.focus();
                    i = 1;
                    break;
                }
            }
            return i;
        }
        //fine search error
        //remember me
        document.querySelector("#remember_me").addEventListener("change",function(e){
            if(e.target.checked)
            this.value="on";
            else
            this.value="off";
        })
    </script>
</body>

</html>