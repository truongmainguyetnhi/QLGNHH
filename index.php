<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PANICLOGIS</title>
    <link rel="stylesheet" href="stylecss/css.css" type="text/css" />
    <link rel="shortcut icon" href="img/logo.png" type="image/png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div id="top">
        <?php require "elements/top.php" ?>
    </div>
    <div id="left">
        <?php require "elements/left.php" ?>
    </div>
    <div id="center">
        <?php require "elements/center.php" ?>
    </div>
    <nav class="sidebar">

        <header>
            <div class="image-text">
                <span class="image">
                    <img src="img/logo.png" alt="logo">
                </span>
                <div class="text header-text">
                    <span class="name">PanicLogis</span>
                    <span class="profession">TMNN</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu-">
            <div class="menu">
                <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-home-smile'></i>
                        <span class="text nav-text">Dasboard</span>
                    </a>
                </li>
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-home-smile'></i>
                            <span class="text nav-text">Dasboard</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <script src="https://code.jquery.com/jquery-3.6.4.js" type="text/javascript"></script>
    <script src="js/jscript.js" type="text/javascript"></script>
</body>

</html>