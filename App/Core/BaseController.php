<?php

class BaseController{
    
    public function View($view = null,$controller = null,$data = []){
        $file_helper = new FileHelper();    
        $view_path = " " ;
        $layout = "MainLayout";
        if($view != null && $controller!=null){
            $view_path = $file_helper->GetViewFilePath($view,$controller);
        }else if($view != null && $controller == null){
            $view_path = "./App/Views/".$view.".php";
        }else if($view == null){
            $view_path = "./App/Views/Client/index.php";
        }
        if(file_exists($view_path)){
            if(isset($data["layout"])){
                $layout = $data["layout"];
            }
            require_once "./App/Views/Layout/".$layout.".php";
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