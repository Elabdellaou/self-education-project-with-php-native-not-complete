<?php
include '../Source/php/Tools/Access.php';
include '../Source/php/Tools/Active_link.php';
include '../Source/php/Tools/Active_mode.php';

$err_up = isset($_GET['errup']) ? 'danger' : 'nor';
$page = "home";
setcookie("page_start", "home.php", time() + 60 * 60 * 24 * 30, "/");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../Links/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Links/css/all.min.css">
    <script src="../Source/js/jQuery/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
    <script src="../Links/js/splitting.js"></script>
    <link rel="stylesheet" href="../css/typed.css">
    <link rel="stylesheet" href="../css/Main.css">
    <link rel="stylesheet" href="../css/login1.css">
    <link rel="stylesheet" href="../css/Splitting.css">
    <link rel="stylesheet" href="../css/settings1.css">
    <link rel="stylesheet" href="../Links/node_modules/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body class=" w-100 d-flex flex-column <?= $mode ?>" style="height:max-content;">
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
                                        <img src="../Images/users/<?=$u->getImage();?>" alt="Image user" width="40px" height="40px" style="" >
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
                            <li><a class="dropdown-item rounded-1" href="Contact.php">
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
        <section class="w-100" id="introduction" style="height: 580px;">
            <div class="container text-white d-flex py-5 flex-lg-row  h-100" style="z-index:1027">
                <div class="information_user d-flex justify-content-center justify-content-lg-start" style="width:350px ;">
                    <div class="content h-100 row row-cols-1 mx-0 d-flex justify-content-center py-4" style="width: 350px;border-radius:0.7rem !important;overflow:hidden;">
                        <img src="../Images/users/<?=$u->getImage();?>" class="img-user p-0" id="active-image"></img>
                        <div class="information pt-4">
                            <h3 class="text-center name-user h4 fw-bold"><?=$u->getFullName();?></h3>
                            <div class="country">
                                <span class="country-panl"></span>
                                <span class="country-name"><?=$u->getCountry();?></span>
                            </div>
                            <div class="level">
                                Level <span class="level-value"><?=$u->getLv();?></span>
                            </div>
                            <div class="xp">
                                <p><i class="fa-solid fa-star pe-2"></i><span class='xp-value'><?=$u->getXp();?> </span>XP</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn scrollnext d-flex justify-content-center h-100" style="width:350px ;">
                    <div class="content fw-bold lh-1 text-white align-self-end">
                        <span style="font-size: 4rem;">
                            <i class="bi bi-mouse"></i>
                        </span>
                        <i class="bi bi-chevron-down fs-1"></i>
                        <i class="bi bi-chevron-down fs-2"></i>
                        <i class="bi bi-chevron-down fs-3"></i>
                    </div>
                </div>
                <div class="incentivize  d-flex justify-content-lg-end" style="width:350px ;">
                    <div class="content py-3 d-flex flex-column" style="width: 350px;">
                        <img src="../Images/img-typed1.png" alt="" class="img-typed mx-auto rounded-3 ">
                        <div class="div-typed mt-4 rounded-2 px-5">
                            <span class="type1 text-white fw-bold w-50 mt-4 fs-5">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="definition w-100 mt-4 d-flex flex-column justify-content-center">
            <div class="container rounded-3">
                <?php if (isset($_GET['settings'])) { ?>
                    <div class="update_info row row-cols-1 row-cols-lg-2 my-4">
                        <div class="upd_img d-flex justify-content-center justify-content-lg-start ">
                            <div class="content_img" style="width: 340px;">
                                <img src="../Images/users/<?=$u->getImage();?>" class="mb-2 rounded-3" width="100%" height="340px" id="img_user_upd" alt="" srcset="" style="">
                                <p class="text-danger fw-bold text-center py-1" id="alter-img" style="display:none">Please choose another picture</p>
                                <div class="input-group">
                                    <form action="../Source/php/Tools/update_image.php" class="w-100" method="post" enctype="multipart/form-data">
                                        <input type="file" id="image" class="image-up" name="img" accept="image/*">
                                        <label for="image" class="btn btn-war fw-bold w-100 d-flex rounded-3 justify-content-center align-items-center" id="im" style="cursor: pointer;">
                                            <i class="fa-solid fa-file-image "></i>&nbsp;
                                            Choose a Photo
                                        </label>
                                        <div class="up-img_btn  w-100 mt-1">
                                            <div class="content   d-flex justify-content-between ">
                                                <button class="btn btn-war w-100 rounded-3 me-2 fw-bold" id="save_up_img" type="submit" name="upd_img">
                                                    Save
                                                </button>
                                                <button class="btn btn-war w-100 rounded-3 fw-bold" type="reset" id="annuler_up_img">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <p class="text-muted text-center mt-2">
                                    JPG OR PNG, Max size 2MB
                                </p>
                            </div>
                        </div>
                        <div class="upd_inf">
                            <h4 class="title-upd-inf text-center text-lg-start mb-4">
                                <span class="fs-5 fw-bold pb-2 shadow-primary-input">
                                    Information
                                </span>
                            </h4>
                            <p class="fs-5 mb-2 " id="alert" style="font-weight:600;"></p>
                            <div class="form-input mb-3 position-relative">
                                <input type="text" class="w-100 rounded-3 shadow-primary-input border border-nor" value="<?=$u->getFullName();?>" id="fullname" placeholder="Full name" autocomplete="off" style="padding-left: 10% !important;" />
                                <i class="fa-solid fa-user position-absolute top-50 translate-middle fs-5 text-nor" style="left: 5%;"></i>
                            </div>
                            <div class="form-input mb-3 position-relative">
                                <input type="email" class=" w-100 rounded-3 shadow-primary-input border border-<?= $err_up ?>" value=<?=$u->getEmail();?> id="email" placeholder="Email address" autocomplete="off" style="padding-left: 10% !important;" />
                                <i class="fa-solid fa-envelope position-absolute top-50 translate-middle fs-5 text-<?= $err_up ?>" style="left: 5%;"></i>
                            </div>
                            <div class="form-input search-box mb-3 position-relative">
                                <input type="search" class="w-100 rounded-3 shadow-primary-input border border-nor " id="country" value=<?=$u->getCountry();?> placeholder="Country" autocomplete="off" style="padding-left: 10% !important;" />
                                <i class="fa-solid fa-earth-africa position-absolute top-50 translate-middle fs-5 text-nor" style="left: 5%;"></i>
                                <div id="result_country" class="position-absolute w-100 bg-light text-black start-0 p-2 rounded-3" style="bottom:110%;max-height: 185px;overflow-y:scroll;"></div>
                            </div>
                            <div class="form-input mb-4 position-relative">
                                <input type="password" class="w-100 rounded-3 shadow-primary-input border border-nor " maxlength="16" value="<?=$u->getPassword();?>" id="password" placeholder="password" autocomplete="off" style="padding-left: 10% !important;" />
                                <i class="fa-solid fa-lock position-absolute top-50 translate-middle fs-5 text-nor" style="left: 5%;"></i>
                                <i class="fa-solid fa-eye position-absolute end-0 translate-middle text-nor" id="ic_ps" style="top:50%;font-size:1rem !important;cursor:pointer;"></i>
                            </div>
                            <button class="btn btn-war fs-5" style="font-weight: 600;" id="update_info">
                                Save
                            </button>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="debut content text-center fw-bold mb-4">
                        <div class="d-flex shadow-title justify-content-center py-4">
                            <p class="difinition-title fs-1 ">About our <span>C</span> course</p>
                        </div>
                        <p class="difinition_text  fs-3">Our course covers basic concepts, variables, arrays, conditional statements, loops, functions, strings, and much more.</p>
                    </div>
                    <div class="content row row-cols-1 row-cols-lg-3 p-0 pb-5">
                        <div class='card-niveu d-flex justify-content-center justify-content-lg-start '>
                            <div class="card valid py-3 h-100" style="width: 360px;">
                                <div class="card-img-top">
                                    <img src="../Images/niveu/niveu1.svg" class="card-img-top" alt="">
                                </div>
                                <div class="card-body p-0 px-4 my-2">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <div class="progress-niveu progress-start px-4 my-2 w-100">
                                    <div class="progress-information ">
                                        <div class=" d-flex position-relative flex-row">
                                            <span class="progress-title fs-3">Progress</span>
                                            <span class="progress-result position-absolute end-0 fs-3"><span class="result-pro">7</span>/10</span>
                                        </div>
                                        <div class="progress mt-2">
                                            <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="7" aria-valuemin="0" aria-valuemax="10"></div>
                                        </div>
                                    </div>
                                    <div class="progress-locked text-center fs-4">
                                        Locked
                                    </div>
                                </div>
                                <div class="card-access h-100 w-100  d-flex justify-content-center align-items-center">
                                    <a href="" class="fa-solid">
                                    </a>
                                    <!--fa-check
                                    fa-play -->
                                </div>
                            </div>
                        </div>
                        <div class='card-niveu d-flex justify-content-center'>
                            <div class="card active py-3 h-100 " style="width: 360px;">
                                <div class="card-img-top">
                                    <img src="../Images/niveu/niveu2.svg" class="card-img-top" alt="">
                                </div>
                                <div class="card-body p-0 px-4 my-2">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <div class="progress-niveu  px-4 my-2 w-100">
                                    <div class="progress-information">
                                        <div class=" d-flex position-relative flex-row">
                                            <span class="progress-title fs-3">Progress</span>
                                            <span class="progress-result position-absolute end-0 fs-3"><span class="result-pro">3</span>/10</span>
                                        </div>
                                        <div class="progress mt-2">
                                            <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="3" aria-valuemin="0" aria-valuemax="10"></div>
                                        </div>
                                    </div>
                                    <div class="progress-locked text-center fs-4">
                                        Locked
                                    </div>
                                </div>
                                <div class="card-access h-100 w-100 d-flex justify-content-center align-items-center">
                                    <a href="" class="fa-solid">
                                    </a>
                                    <!--fa-check
                                    fa-play -->
                                </div>
                            </div>
                        </div>
                        <div class='card-niveu d-flex justify-content-center justify-content-lg-end '>
                            <div class="card locked py-3 h-100 " style="width: 360px;">
                                <div class="card-img-top">
                                    <img src="../Images/niveu/niveu3.svg" class="card-img-top" alt="">
                                </div>
                                <div class="card-body p-0 px-4 my-2">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <div class="progress-niveu  px-4 my-2 w-100">
                                    <div class="progress-information">
                                        <div class=" d-flex position-relative flex-row">
                                            <span class="progress-title fs-3">Progress</span>
                                            <span class="progress-result position-absolute end-0 fs-3"><span class="result-pro">3</span>/10</span>
                                        </div>
                                        <div class="progress mt-2">
                                            <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="3" aria-valuemin="0" aria-valuemax="10"></div>
                                        </div>
                                    </div>
                                    <div class="progress-locked text-center fs-4">
                                        Locked
                                    </div>
                                </div>
                                <div class="card-access h-100 w-100  d-flex justify-content-center align-items-center">
                                    <a href="" class="fa-solid">
                                    </a>
                                    <!--fa-check
                                    fa-play -->
                                </div>
                            </div>
                        </div>
                        <div class="certificate w-100 mt-4">
                            <div class="content">
                                <div class="certificate_info">
                                    <div class="d-flex shadow-title certificate_title_desktop justify-content-center py-4 mb-2">
                                        <p class="difinition-title fs-1 ">Certification</p>
                                    </div>
                                    <p class="certificate_info-text text-center fs-3">In order to get you certificate you should first finish all the levels.
                                        <br>
                                        Certificates play a great role on proving your skills and education level.
                                    </p>
                                </div>
                            </div>
                            <div class="certificate-content d-flex justify-content-start justify-content-md-end">
                                <div class="get-certificate h-100 pt-5 pe-5 me-lg-l5">
                                    <div>
                                        <p class="get-certificate-title">
                                            Here’s how close you are to getting the certificate:
                                        </p>
                                        <p class="result-certificate">
                                            <span class="progress-result">15</span>%
                                        </p>
                                        <div class=" progress progress-certificate w-75">
                                            <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="progress-info pt-1">
                                            Course progress
                                        </p>
                                    </div>
                                    <!--disabled-->
                                    <button class="btn btn-war disabled btn-get-certificate" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="font-weight: 600;">Acquire your certificate</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog  modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body-certificate px-4">
                                                    <div class="Modal certificate-footer d-flex justify-content-between my-3">
                                                        <h5 class="modal-title text-black fw-bold fs-4" id="staticBackdropLabel">Certificate</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="img">
                                                        <img src="../../dynamicPHPCertificate/certificate.jpg" width="100%" alt="">
                                                    </div>
                                                    <div class="copy-link my-4 d-flex justify-content-between">
                                                        <div class="form-input position-relative" style="width:80%;">
                                                            <input id="link-certificate" type="text" class="h-100 w-100 rounded-3 border shadow-primary-input border-nor text-black fs-6" id="email_sign_in" name="email_in" readonly value="http://localhost/dynamicPHPCertificate/certificate.jpg" placeholder="Email address" required autocomplete="off" />
                                                            <i class="bi bi-link-45deg fs-5 position-absolute top-50 translate-middle fs-5 text-nor" style="left: 7%;"></i>
                                                        </div>
                                                        <div>
                                                            <button id="btn-copy" class="btn h-100 fw-bold text-nor border border-nor shadow-primary-input">
                                                                Copy
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="download_certificate d-flex justify-content-between my-3">
                                                        <button type="button" class="btn btn-war" style="font-weight: 600;">Download JPG</button>
                                                        <button type="button" class="btn btn-war" style="font-weight: 600;">Download PDF</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </main>
    <footer class="w-100 bg-<?= $footer_bg ?> pt-4">
        <div class="container">
            <div class="footer-title fs-2 fw-bold mb-4">
                Follow us
            </div>
            <ul class="sci row row-cols-2 row-cols-md-4">
                <li><a href="">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a></li>
                <li><a href="">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a></li>
                <li><a href="">
                        <i class="fa-brands fa-instagram"></i>
                    </a></li>
                <li><a href="">
                        <i class="fa-brands fa-twitter"></i>
                    </a></li>
            </ul>
            <p class=" w-100 text-muted text-center fs-5 mt-4">&copy; 2022 Self Education </p>
        </div>
    </footer>
    <script src="../Links/js/particles.js"></script>
    <script src="../Links/js/particles_app.js"></script>
    <script src="../Links/js/vanila-tilt.js"></script>
    <script src="../Links/js/bootstrap.bundle.min.js"></script>
    <script src="../Source/js/main1.js"></script>
    <script>
        //vanila tilt
        setTimeout(() => {
            VanillaTilt.init(document.querySelector(".information_user .content"), {
                reverse: true,
                max: 15,
                transition: true,
                reset: true,
                scale: 0.9,
                glare: true,
                "max-glare": 0.9,
                speed: 400
            });
        }, 1500);
        //typed objet
        var typed = new Typed('.type1', {
            strings: [
                '',
                '"Nothing is more necessary to achieve success of any kind than perseverance, because it transcends everything even nature."',
                '"It is not one giant step that has achieved an achievement, but a group of small steps."',
                '"The road to success is crowded, but the road to excellence is empty, so be the first to pass it."',
                '"Whoever sowed found, and whoever sowed reaped... so plant for your coming days, earnestness and diligence."',
                '"The one who never makes mistakes hasn\'t tried anything new."',
                '"To move the world, we must first move ourselves."',
                '"Work is the key to success, and hard work can help you accomplish anything."',
                '"All roads that lead to success have to pass through hard work boulevard at some point."',
                '"Most times , the way isn\'t clear, but you want to start anyway. It is in starting... that other steps become clearer."'
            ],
            backDelay: 10000,
            startDelay: 2200,
            typeSpeed: 100,
            backSpeed: 30,
            //cursorChar: '_',
            //shuffle: false,//random
            fadeOut: false,
            smartBackspace: true, // this is a default
            loop: true
        });
        /*
            typed.start();
            typed.toggle();
            typed.stop();
            typed.reset();
            typed.destroy();
        */
        /*setTimeout(() => {
            document.querySelector('.type').innerHTML = "Hello world! <br >My Name is: Ibrahim Elabdellaoui <br >I `m web developer";
            Splitting();
        }, 1500);
        <span class="type text-white fw-bold fs-5 lh-lg" data-splitting>
        </span>*/
        //gsap animate
        gsap.from("#introduction .container", {
            opacity: 0,
            y: -400,
            duration: 2,
            delay: 0.5
        });

        let links = document.querySelectorAll('#nav-link');

        //active link
        /*
        for (let link of links) {
            link.addEventListener('click', active_link);
        }

        function active_link() {
            for (let link of links) {
                if (link.classList.contains('active'))
                    link.classList.remove('active');
            }
            this.classList.add('active');
        }
        */
        //scroll start course
        let mouse = document.querySelector('.bi-mouse');
        mouse.addEventListener('click', () => {
            window.scrollTo({
                top: document.querySelector('.definition').offsetTop - 80,
                behavior: 'smooth'
            });
        });
        $("#btn-copy").on("click", function() {
            $(this).addClass("active");
            $("#link-certificate").select();
            document.execCommand("copy");
            window.getSelection().removeAllRanges();
            setTimeout(() => {
                $(this).removeClass("active");
            }, 1500);
        });
        <?php if (isset($_GET['settings'])) { ?>
            //hide show password
            $("#ic_ps").on("click", function() {
                if ($(this).hasClass("fa-eye")) {
                    replace_class($(this), "fa-eye", "fa-eye-slash");
                    $("#password").get(0).type = "text";
                } else {
                    replace_class($(this), "fa-eye-slash", "fa-eye");
                    $("#password").get(0).type = "password";
                }
            });

            function replace_class(ele, active_class, new_class) {
                ele.removeClass(active_class);
                ele.addClass(new_class);
            }
            //country 

            $('#country').on("keyup input",
                function() {
                    /* Get input value on change */
                    var inputVal = $(this).val();
                    var resultDropdown = $(this).siblings("#result_country");
                    $("#result_country").css("display", "block");
                    if (inputVal.length) {
                        $.get("../Source/php/Tools/backend-search.php", {
                            term: inputVal
                        }).done(function(data) {
                            // Display the returned data in browser
                            resultDropdown.html(data);
                        });
                    } else {
                        resultDropdown.empty();
                    }
                });
            // Set search input value on click of result item
            $(document).on("click", "#result_country p", function() {
                $(this).parents(".search-box").find('input[type="search"]').val($(this).text()); //find b7al foreach ta9riban
                $(this).parent("#result_country").empty(); //parents search
                //parent search element
                $("#result_country").css("display", "none");
            });
            $("#country").on("blur", function() {
                setTimeout(() => {
                    $("#result_country").css("display", "none");
                }, 500);
            })
            //submit valider
            //validate password 
            const re_validate_password = /^(?=.*\d)(?=.*[a-z])(?=.*[!@#$%^&*]).{8,16}$/i;
            //validate email
            const re_validate_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i;
            //validate name
            const re_validate_name = /^([A-Za-zéàë]{4,30} ?)+$/i;
            //save upd
            $("#update_info").on("click", function() {
                let err_up = "";
                let color = "text-danger";
                let element = "";
                if (re_validate_name.test($("#fullname").val()) == false) {
                    err_up = "Fill in the name (use of special characters is prohibited)."
                    element = $("#fullname");
                } else if (re_validate_email.test($("#email").val()) == false) {
                    if (err_up == "") {
                        err_up = "example : username@example.com."
                        element = $("#email");
                    }
                } else if (re_validate_name.test($("#country").val()) == false) {
                    if (err_up == "") {
                        err_up = "Fill in the country (use of special characters is prohibited)."
                        element = $("#country");
                    }
                } else if (re_validate_password.test($("#password").val()) == false) {
                    if (err_up == "") {
                        err_up = "Please enter a more secure password (more than 8 chars, number and special character)."
                        element = $("#password");
                    }
                } else {
                    $.ajax({
                        method: "POST",
                        url: "../Source/php/Tools/update_info.php",
                        data: {
                            fullname:$("#fullname").val(),
                            email:$("#email").val(),
                            country:$("#country").val(),
                            pass:$("#password").val(),
                            update:""
                        },
                        success: function(data) {},
                        complete: function() {
                            location.reload(true);
                        }
                    });
                }
                result_up(element, color, err_up);
            });
            //update ??
            function result_up(ele, color, text) {
                if (ele != "") {
                    replace_class(ele, "border-nor", "border-danger");
                    ele.focus();
                }
                $("#alert").text(text);
                $("#alert").addClass(color);
                setTimeout(() => {
                    if (ele != "")
                        replace_class(ele, "border-danger", "border-nor");
                    $("#alert").text("");
                    $("#alert").removeClass(color);
                }, 1500);

            }
            //update image
            let input_img = document.querySelector(".image-up");
            let image_user_src = document.querySelector("#active-image");
            let image_user = document.querySelector("#img_user_upd");
            let upd_img = document.querySelector(".up-img_btn");
            let alt_img=document.querySelector("#alter-img");
            //validate type image
            var allowedExtension = ['image/jpeg', 'image/jpg', 'image/png','image/JPEG', 'image/JPG', 'image/PNG'];
            input_img.addEventListener("change", function() {
                let type = this.files[0].type;
                console.log(this.files[0].size/(1024*1024));
                if(allowedExtension.indexOf(type)>-1&&this.files[0].size/(1024*1024)<=2){
                    image_user.src = URL.createObjectURL(this.files[0]);
                    upd_img.style.cssText = "display:block !important";
                }else{
                    alt_img.style.cssText="display:block";
                    setTimeout(() => {
                        alt_img.style.cssText="display:none";
                    }, 2000);
                }
            });
            document.querySelector("#annuler_up_img").onclick = () => {
                image_user.src = image_user_src.src;
                upd_img.style.cssText = "display:none !important";
            }
        <?php } ?>
    </script>
</body>

</html>