<?php

class BaseController{
    
    public function View($view = null,$controller = null,$data = [],$has_layout = true){
        $file_helper = new FileHelper();    
        $view_path = " " ;
        $layout = $has_layout?"MainLayout":null;
        if($view != null && $controller!=null){
            $view_path = $file_helper->GetViewFilePath($view,$controller);
        }else if($view != null && $controller == null){
            $view_path = "./App/Views/".$view.".php";
        }else if($view == null){
            $view_path = "./App/Views/Client/index.php";
        }
        if(file_exists($view_path)){
            if($has_layout){
                if(isset($data["layout"])){
                    $layout = $data["layout"];
                }
                require_once "./App/Views/Layout/".$layout.".php";
            }else{
                require_once $view_path;
            }
        }else{
            echo "View is not found";
        }
    }
    public function Model($model){
        if($model){
            $model_path = "./App/Model/".$model."Model.php";
            if(file_exists($model_path)){
                require_once $model_path;
                if(class_exists($model)){
                    return new $model;
                }else{
                    echo "Warning : No Class In ".$model."Model";
                }
            }else{
                echo "Model is not found";
            }
        }
    }
}
?>