<?php
class App
{
    protected $controller = "HomeController";
    protected $action = "index";
    protected $params = [];

    function __construct()
    {
        $arr = $this->UrlProcess();
        
        // Controller
        if (!empty($arr) && file_exists("././mvc/controllers/" . ucfirst($arr[0]) . "Controller.php")) {
            $this->controller = ucfirst($arr[0]) . "Controller";
            unset($arr[0]);
        }
        require_once "././mvc/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;
    
        // Action
        if (isset($arr[1])) {
            if (method_exists($this->controller, $arr[1])) {
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }
    
        // Params
        $this->params = $arr ? array_values($arr) : [];
        call_user_func_array([$this->controller, $this->action], $this->params);
    }
    

    function UrlProcess()
    {
        /**
         * split string url to array by / separator
         */
        if (isset($_SERVER["REDIRECT_URL"])) {
            return explode("/", filter_var(trim($_SERVER["REDIRECT_URL"], "/")));
        }
    }
}
