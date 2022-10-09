<?php

$mode = (isset($_COOKIE['dark-mode']) && !empty($_COOKIE['dark-mode'])) ? $_COOKIE['dark-mode'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link rel="stylesheet" href="../../../Links/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../Links/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../Links/css/all.min.css">
    <script src="../../../Source/js/jQuery/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../../Links/js/sorttable.js"></script>
    <link rel="stylesheet" href="../../../css/login1.css">
    <style>
        body .content::before {
            display: none !important;
        }
    </style>
</head>

<body class="w-100 vh-100 d-flex justify-content-center align-items-center <?= $mode ?>" style="overflow:hidden" onload="lo()">
    <div class="content w-75 bg-white" style="overflow: hidden;height:80%">
        <div class="header px-5 pt-3 w-100 d-flex flex-row justify-content-between">
            <a class="logo fs-5 shadow-primary-input" style="font-weight: 510;" href="">
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
        <main class="mt-5 d-flex justify-content-center align-item-center">
            <div class="wrapper w-75 h-50">
                <div class="item py-2 px-3 d-flex justify-content-between flex-row rounded-3 my-2" style="background-color:#6478eb;cursor:pointer;">
                    <span class="text">
                        Order
                    </span>
                    <i class="fas fa-bars my-auto "></i>
                </div>
                <div class="item py-2 px-3 d-flex justify-content-between flex-row rounded-3 my-2" style="background-color:#6478eb;cursor:pointer;">
                    <span class="text">
                        Order
                    </span>
                    <i class="fas fa-bars my-auto "></i>
                </div>
                <div class="item py-2 px-3 d-flex justify-content-between flex-row rounded-3 my-2" style="background-color:#6478eb;cursor:pointer;">
                    <span class="text">
                        Order
                    </span>
                    <i class="fas fa-bars my-auto "></i>
                </div>
                <div class="item py-2 px-3 d-flex justify-content-between flex-row rounded-3 my-2" style="background-color:#6478eb;cursor:pointer;">
                    <span class="text">
                        Order
                    </span>
                    <i class="fas fa-bars my-auto "></i>
                </div>
            </div>
        </main>
    </div>

    <script src="../../../Links/js/bootstrap.bundle.min.js"></script>
    <script>
        //icon dark mode
        let icon = document.querySelector("label .icon i");
        icon.addEventListener('click', change_mode);

        function change_mode() {
            let data = document.body.classList.toggle("dark-mode") ? 1 : 0;
            document.body.classList.contains("dark-mode") ? icon.classList.replace("bi-brightness-high-fill", "bi-moon-stars-fill", ) : icon.classList.replace("bi-moon-stars-fill", "bi-brightness-high-fill");
            $.ajax({
                method: 'Post',
                url: "../../../Source/php/Tools/dark-mode.php",
                data: {
                    mode: data,
                },
                success: function(data) {}
            });
        }

        function lo() {
            document.body.classList.contains("dark-mode") ? icon.classList.replace("bi-brightness-high-fill", "bi-moon-stars-fill") : icon.classList.replace("bi-moon-stars-fill", "bi-brightness-high-fill");
        }
        //sort table
        let dragArea=document.querySelector(".wrapper");
        new Sortable(dragArea,{
            handle:'.item',
            animation:200
        });
    </script>
</body>

</html>