<?php
include '../Source/php/Tools/Access.php';
include '../Source/php/Tools/Active_mode.php';
include '../Source/php/Tools/Active_link.php';
$page = "contact";
setcookie("page_start", "Contact.php", time() + 60 * 60 * 24 * 30, "/");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../Links/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Links/css/all.min.css">
    <script src="../Source/js/jQuery/node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/Main.css">
    <link rel="stylesheet" href="../css/login1.css">
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="../Links/node_modules/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body class=" w-100 d-flex flex-column <?= $mode ?>" style="height:min-content;">
    <header id="header" class="navbar w-100 navbar-expand-lg fixed-top navbar-<?= $header_color ?> bg-<?= $header_color ?>">
        <div class="container py-2 ps-4 d-flex">
            <a class="logo fs-5 shadow-primary-input d-flex align-items-center" style="font-weight: 510;" href="">
                <span class="text-nor fs-4 fw-bold">Self</span>Education
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-sm-start justify-content-lg-end" id="navbarSupportedContent">
                <ul class="navbar-nav d-flex align-items-sm-start align-items-lg-center">
                    <li class="nav-item checkbox-div fw-bold fs-3 mt-sm-3 mt-lg-0 me-ms-0 me-lg-5 rounded-circle d-flex align-items-center justify-content-center">
                        <label id="mode" for="#checkbox-mode" class=" d-flex align-items-center justify-content-center">
                            <input type="checkbox" name="" id="checkbox-mode" style="display: none;">
                            <div class="icon">
                                <i class="bi bi-brightness-high-fill"></i>
                            </div>
                        </label>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= activeLink() ?>" aria-current="page" id="nav-link" href="home.php">
                            <i class="fa-solid fa-house"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= activeLink("leaderboard") ?>" id="nav-link" href="Leaderboard.php">
                            <i class="fa-solid fa-trophy"></i>
                            <span>Leaderboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= activeLink("contact") ?>" id="nav-link" href="Contact.php">
                            <i class="fa-solid fa-comments"></i>
                            <span>Contact</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle rounded-3 py-1" href="/" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../Images/users/<?=$nav_picture?>" alt="" width="31px" height="31px" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu <?= $mode_dropdown ?> px-2 rounded-3" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item d-flex flex-row rounded-1" href="home.php" id="content_result">
                                    <div class="h-100">
                                        <img src="../Images/users/<?=$u->getImage();?>" alt="Image user" width="40px" height="40px">
                                    </div>
                                    <div class="h-100 ps-2 pt-2" style="line-height: 2px;font-size:1rem;">
                                        <p id="user_name"><?=$u->getFullName();?></p>
                                        <p style="color:#6c757d;font-size:0.8rem;">Go to profile</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item rounded-1" href="home.php?settings=true">
                                    <i class="fa-solid fa-gear me-2"></i>
                                    Settings
                                </a></li>
                            <li><a class="dropdown-item rounded-1" href="">
                                    <i class="fa-solid fa-circle-question me-2"></i>
                                    Help
                                </a></li>
                            <li><a class="dropdown-item rounded-1" href="../Source/php/Tools/logout.php">
                                    <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>
                                    Sign out
                                </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <main class="w-100" style="margin-top:68px ;">
        <div class="container ps-5">
            <div class="text-contact pt-5 pb-4">
                <p class="title-contact text-center fs-2">
                    Contact Us
                </p>
                <p class="introduction-contact text-center fs-4">
                    please get in touch and our expert support team will answer all your questions.
                </p>
            </div>
            <div class="content-contact ">
                <div class="container p-0 row row-cols-1 mt-4 row-cols-lg-2">
                    <div class="information-contact py-5">
                        <div class="information-address row row-cols-2">
                            <div class="icon rounded-circle">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div class="content-information w-75">
                                <h4 class="title-information">
                                    Address :
                                </h4>
                                <p class="text-information ">
                                    Rue kadi ayad nr19 , Asilah-Tanger
                                </p>
                            </div>
                        </div>
                        <div class="information-email pt-5 row row-cols-2">
                            <div class="icon rounded-circle">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            <div class="content-information w-75">
                                <h4 class="title-information">
                                    Email :
                                </h4>
                                <p class="text-information">
                                    ibrahimelabdellaoui43@gmail.com
                                </p>
                            </div>
                        </div>
                        <div class="information-phone pt-5 row row-cols-2">
                            <div class="icon rounded-circle">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                            <div class="content-information w-75">
                                <h4 class="title-information">
                                    Phone :
                                </h4>
                                <p class="text-information">
                                    +212 633 39 41 72
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="form-contact py-4 px-0">
                        <div class="content ps-0 ps-lg-5">
                            <div class="title-form mb-4">Send Message</div>
                            <p class="fs-5 " id="alert" style="font-weight:600;"></p>
                            <div class="form-floating mb-3" id="name">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Full name">
                                <label for="floatingInput">Full name</label>
                            </div>
                            <div class="form-floating mb-3" id="email">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-4" id="message">
                                <textarea class="form-control" placeholder="Typeyour Message" id="floatingTextarea2" maxlength="100" style="height: 130px;"></textarea>
                                <label for="floatingTextarea2">Type your Message</label>
                            </div>
                            <button type="submit" name="send-message" id="send-message" class="btn btn-war" style="font-weight:600 !important;width:50%">
                                Send
                                <i class="bi bi-send-fill" id="send-message"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="w-100 bg-<?= $footer_bg ?> pt-4" style="margin-top:70px ;">

    </footer>
    <script src="../Links/js/vanila-tilt.js"></script>
    <script src="../Links/js/bootstrap.bundle.min.js"></script>
    <script src="../Source/js/main1.js"></script>
    <script>
        $(document).ready(function() {
            $("footer").load("home.php footer .container");
            $("#name input").focus();
            //validate data
            //validate email
            const re_validate_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i;
            //validate name
            const re_validate_name = /^([A-Za-zéàë]{4,30} ?)+$/i;
            //validation text
            const re_validate_message = /^([A-Za-zéàë]{2,100} ?)+$/i;

            $("#send-message").on('click', function() {
                if (re_validate_name.test($("#name input").val()) == false)
                    replace_info($("#name input"), "Please re-erter your name.");
                else if (re_validate_email.test($("#email input").val()) == false)
                    replace_info($("#email input"), "Check the email.");
                else if (re_validate_message.test($("#message textarea").val()) == false)
                    replace_info($("#message textarea"), "Check the message you want to send.");
                else
                    send_message($("#name input").val(), $("#email input").val(), $("#message textarea").val());
            });
            //function reset input
            function reset_div(ele) {
                setTimeout(() => {
                    $("#alert").text("");
                    $("#alert").removeClass("text-danger");
                    ele.removeClass("border-danger");
                }, 1500);
            }
            //replace 
            function replace_info(ele, msg) {
                $("#alert").text(msg);
                $("#alert").addClass("text-danger");
                ele.focus();
                ele.addClass("border-danger");
                reset_div(ele);
            }
            //send mail
            function send_message(name, mail, msg) {
                $.ajax({
                    method: "POST",
                    url: "../Source/php/mail/Contact_me.php",
                    data: {
                        name: name,
                        email: mail,
                        message: msg,
                        submit: ""
                    },
                    success: function(data) {},
                    complete: function() {
                        $("#alert").text("send your message.");
                        $("#alert").addClass("text-primary");
                        $("#send-message i").removeClass("bi-send-fill");
                        $("#send-message i").addClass("bi-send-check-fill");
                        reset_send();
                    }
                });
            }
            //reset after
            function reset_send() {
                setTimeout(() => {
                    $("#alert").text("");
                    $("#alert").removeClass("text-primary");
                    $("#send-message i").removeClass("bi-send-check-fill");
                    $("#send-message i").addClass("bi-send-fill");
                }, 4000);
            }
            //keyboard
            $("#name input").on("keypress", function(e) {
                if (e.key === "Enter")
                    $("#email input").focus();
            });
            $("#email input").on("keypress", function(e) {
                if (e.key === "Enter")
                    $("#message textarea").focus();
            });
            $("#message textarea").on("keypress", function(e) {
                if (e.key === "Enter")
                    $("#send-message").click();
            });

        });
    </script>
</body>

</html>