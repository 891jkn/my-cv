<?php
// view helper 
$view_helper = new ViewHelper();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($title)){echo $title;}else{echo "Home";} ?></title>
    <base href="http://localhost:8080/mycv/App/public/">
    <link rel="stylesheet" href="vendor/css/base.css">
    <link rel="stylesheet" href="vendor/css/grid.css">
    <link rel="stylesheet" href="vendor/css/responsive.css">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="vendor/icons/fontawesome-free-5.15.4-web/css/all.css">
       <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Luxurious+Roman&family=Montserrat:ital,wght@0,500;0,700;0,800;0,900;1,100&family=Play:wght@700&family=Playfair+Display:ital,wght@1,800&family=Quicksand:wght@300;500;600;700&family=Roboto+Condensed:wght@300;400;700&family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body id="main">
    <div id="root">
        <?php 
        if(isset($view_path)){
            require_once($view_path);
        }else{$view_helper->GenderView("./App/Views/Client/Home/index.php");}?>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/js/controller.js"></script>
    
</body>
</html>
