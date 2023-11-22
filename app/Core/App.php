<?php
/**
 *front end controller 
 */


 class App{
        protected $controller = "HomeController";
        protected $action = "index";
        protected $params =[];

    //pour manipuler les données dans l'url
    public function __construct(){
        $this->prepareURL();
        $this->render();
    }

    /**
     *
     *Extract controller, method and action
     * @return void
     */

    private function prepareURL(){
        $url = $_SERVER['QUERY_STRING'];
        if(!empty($url)){
            $url = trim($url,'/');
            $url = explode("/",$url);
            // echo $url[2];
        
            //Define the controller
            $this->controller = isset($url[0]) ? ucwords($url[0])."Controller":"HomeController";
            // echo $this->controller;
        
            //Define the action
            $this->action = isset($url[1]) ?$url[1] : "index";
            //le "home/index" sera pas compté dans le array cad les parametres d'apres vont commencé de 0
            unset($url[0],$url[1]);
        
            $this->params = !empty($url) ?array_values($url):[];
            // var_dump($this->params) ;
            }
        }
        private function  render(){
             if(class_exists($this->controller)){
                // echo "djhfkld";
                $controller = new $this->controller;

                if(method_exists($controller,$this->action))
                {
                    // echo "Method exist";
                    call_user_func_array([$controller,$this->action],$this->params);
                }
                else
                {
                    // echo "Method Doesn't Exist";
                    new View('error');
                }
             }
             else{
                echo "This Controller :".$this->controller . "Doesn't Exist";
             }

        }
}
