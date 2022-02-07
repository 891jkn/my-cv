<?php
class App{
    
    public $route;
    public $app_name;
    function __construct()
    {
        $this->route = new BaseRoute();
        $permission = false;
        $config_file_path = trim(str_replace("\\","/",str_replace("App\Core"," ",dirname(__FILE__))))."config-server.json";
        if(file_exists($config_file_path)){
            
            $config_data = json_decode(file_get_contents($config_file_path),true);

            if($config_data != null ){
                $this->app_name = $config_data["ProjectName"];
            }
        }else{
            die("\nError when get config file");
        }
        // controller process
        $controller_path = "./App/Controller/".$this->route->controller."Controller.php";
        if(isset($_GET["url"]) || isset($_POST["url"])){
            $url = isset($_GET["url"]) ? $_GET["url"] : $_POST["url"];
            if(strpos($url,'App') !== false){
                $url = substr($url,strpos(strtoupper($url),strtoupper($this->app_name))+strlen($this->app_name),strlen($url)-1);
            }
            $this->route = new BaseRoute($url);
            if(isset($this->route->controller)){
                $test_controller_path =  trim(str_replace("\\","/",str_replace("Core","Controller",__DIR__)))."/".$this->route->controller."Controller.php";
                if(file_exists($test_controller_path)){

                    $controller_path = $test_controller_path;
                    $permission = true;
                }
            }
        }
        if(file_exists($controller_path)){
            require_once $controller_path;
        }else{
            echo "Something err";
        }
        $controller_name = $permission ? $this->route->controller."Controller" : "HomeController";
        $this->route->action = $permission ? $this->route->action : "Index";
        if(method_exists($controller_name,$this->route->action)){
            // check param
            if(is_array($this->route->param)){
                if(!empty($this->route->param)){
                    call_user_func_array([new $controller_name,$this->route->action],$this->route->param);
                }else{
                    call_user_func_array([new $controller_name,$this->route->action],[]);
                }                
            }
        }
        //end action process
    }

}

?>