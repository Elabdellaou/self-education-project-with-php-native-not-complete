<?php
include '../Source/php/Tools/Access.php';
include '../Source/php/Tools/Active_mode.php';
include '../Source/php/Tools/Active_link.php';
$page = "leaderboard";
setcookie("page_start", "Leaderboard.php", time() + 60 * 60 * 24 * 30, "/");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderbroad</title>
    <link rel="stylesheet" href="../Links/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Links/css/all.min.css">
    <script src="../Source/js/jQuery/node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/Main.css">
    <link rel="stylesheet" href="../css/login1.css">
    <link rel="stylesheet" href="../Links/node_modules/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body class=" w-100 d-flex flex-column <?= $mode ?>" id="body_leader" style="height: max-content;">
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
    <Main class="w-100" style="margin-top:68px;">
        <div class="container pt-3 d-flex justify-content-center">
            <div id="content-user" class="content w-75 px-3">
                <div class="footer_leader pb-3">
                    <div class=" fw-bold fs-4 pt-2" id="title_footer_leader" style="color:#6c757d !important;">
                        Leaderboard
                    </div>
                    <div class="body_footer_leader row row-cols-1 row-cols-sm-3 ">
                        <div class="btn level1 py-5 fs-3 fw-bold text-center">Level 1</div>
                        <div class="btn level2 py-5 fs-3 fw-bold text-center">Level 2</div>
                        <div class="btn level3 py-5 fs-3 fw-bold text-center">Level 3</div>
                    </div>
                </div>
                <div class="title_leaders fw-bold pt-3 fs-4" id="title_leaders" style="color:#6c757d !important;height:min-content; ">
                    <p class="title_l pb-2"><span id="leader_with">Global</span> <i class="fa-solid fa-angle-right"></i> Top 10</p>
                </div>
                <div id="result">

                </div>
            </div>
        </div>
    </Main>
    <footer class="w-100 bg-<?= $footer_bg ?> pt-4" style="margin-top:70px;">

    </footer>
    <script src="../Links/js/vanila-tilt.js"></script>
    <script src="../Links/js/bootstrap.bundle.min.js"></script>
    <script src="../Source/js/main1.js"></script>
    <script>
        $(document).ready(function() {
            $("footer").load("home.php footer .container");
            replacedata();

            $('.body_footer_leader div').on('click', function() {
                let i = $(this).hasClass("active") ? 1 : 0;
                $('.body_footer_leader div').each(function() {
                    $(this).removeClass("active");
                });
                if (i == 1) {
                    $("#leader_with").text("Global");
                } else {
                    $(this).addClass("active");
                    $("#leader_with").text($(this).text());
                }
                replacedata();
            });

            function replacedata() {
                $.ajax({
                    method: "POST",
                    url: "../Source/php/Tools/leaders.php",
                    data: {
                        level: $("#leader_with").text()
                    },
                    success: function(data) {
                        $("#result").html(data);
                    }
                });
            }
        });
    </script>

</body>

</html>