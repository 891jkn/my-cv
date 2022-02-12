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
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/css/style.css">
    <link rel="stylesheet" href="vendor/icons/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body id="main">
    <div id="root">
        <?php if(isset($view_path)){$view_helper->GenderView($view_path);}else{$view_helper->GenderView("./App/Views/Client/Home/index.php");}?>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="vendor/js/custom.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
