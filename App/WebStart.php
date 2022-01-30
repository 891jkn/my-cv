<?php
if(file_exists("./App/Helper/FileHelper.php")){
    // required helper file
    require_once "./App/Helper/FileHelper.php";
    $paths = ["/Core/BaseRoute.php","/Core/BaseController.php","/Core/App.php","/Helper/ViewHelper.php","/Core/Database.php"];
    global $file_helper ;
    $file_helper = new FileHelper();
    $file_helper->RequireFile(null,$paths);
    //app start
    $GLOBALS["APP"] = new App();
   
}
?>
