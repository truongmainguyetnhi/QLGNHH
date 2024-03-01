<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <?php
    if (isset($_GET['req'])) {
        $request = $_GET['req'];
        switch ($request) {
            case 'storeview':
                require 'elements/mstore/storeview.php';
                break;
            case 'updatestore':
                require 'elements/mstore/storeUpdate.php';
                break;
            case 'shipperview':
                require 'elements/mshipper/shipperview.php';
                break;
            case 'oderview':
                require 'elements/moder/viewoder.php';
                break;
            case 'hanghoaUpdate':
                require '';
                break;
            case 'login':
                require '';
                break;
        }
    } else {
        require 'elements/default.php';
    }
    ?>
</body>

</html>