<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ENGLOGIS</title>
    <link rel="stylesheet" href="stylecss/css.css" type="text/css" />
    <link rel="shortcut icon" href="img/logo1.png" type="image/png">
</head>

<body>
    <p></p>
    <div id="top">
        <?php require "elements/top.php" ?>
    </div>
    <div id="left">
        <?php require "elements/left.php" ?>
    </div>
    <div id="center">
        <?php require "elements/center.php" ?>
    </div>
    <div id="right">
        <?php require "elements/right.php" ?>
    </div>
    <div id="bottom">
        <?php require "elements/bottom.php" ?>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.4.js" type="text/javascript"></script>
    <script src="js/jscript.js" type="text/javascript"></script>
</body>

</html>