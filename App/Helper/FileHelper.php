<?php
class FileHelper{

    protected $root_path;
    function __construct()
    {
        $this->root_path = "./App";
    }
    public function GetFullPath($path){
        // return full path of file 
        if(file_exists($path)){
            return $path;
        }else{
            return false;
        }
    }
    public function RequireFile($path = null,$paths = []){
        if($path != null){
            if(file_exists($this->root_path.$path)){
                require_once $this->root_path.$path;
            }

        }else if(!empty($paths)){
            foreach($paths as $item){
                if(file_exists($this->root_path.$item)){
                    require_once $this->root_path.$item;
                }else{
                    echo "error";
                }
            }
        }
    }
    public function GetViewFilePath($view,$controller){
        $view_path = $this->root_path."/Views/Client/".$controller."/".$view.".php"; 
        if(file_exists($view_path)){
            return $view_path;
        } 
        return false;
    }
}
?>