<?php

class Facade{

    private $array = [];

    private $controller = null;

    private $method = null;

    private $args = null;

    private $url = null;

    public $request = null;

    public $response = null;

    public function __construct()
    {
        // initialize the request and respond objects
        $this->request  = new Request();
        $this->response = new Response();

        // also initiate the starting config array values
        if(!isset($array['routes'])){
            $array['routes'] = require str_replace("\\", "/", dirname(__DIR__)) . "/app/config/Router.php";
        }

        //print_r($array['routes']); echo "<br>";
    }

    public function run()
    {
        // split the requested URL
        // in order to indentify the controllers and the methods
        $this->splitUrl();

        /*
        echo "<hr>";
        echo $this->controller . "<br>";
        echo $this->method . "<br>";
        print_r($this->args) . "<br>";
        echo count($this->args) . "<br>";
        echo "<hr>";
        */

        // check if the controller parameter is defined in the url or not
        if(!empty($this->controller))
        {
            // validate the controller whether the controller exists or not
            if(!self::validateController($this->controller))
            {
                echo "controller tidak ada<br>";
                // throw error exception

            }
            // if controller exists is valid then validate the methods
            else
            {
                //echo "controller ada<br>";

                // check if the method parameter is empty or not
                if(!empty($this->method))
                {
                    // validate method existence in controller
                    if(self::validateMethod($this->controller, $this->method))
                    {
                        //echo "method ditemukan<br>";

                        // validate the number of method's arguments
                        if(self::validateArgs($this->controller, $this->method, $this->args))
                        {
                            //echo "jumlah argumen sesuai<br>";

                            // everything is checked and valid
                            // finally instantiate the controller object, and call it's action method.

                            $this->invoke($this->controller, $this->method, $this->args);
                        }
                        else
                        {
                            echo "jumlah argumen tidak sesuai<br>";
                        }

                    }
                    else
                    {
                        echo "method tidak ditemukan<br>";
                        // throw error exception
                    }
                }
                else
                {
                    $this->method = "index";

                    if(!method_exists($this->controller, $this->method)){
                        echo "method index tidak ada<br>";
                        //return $this->notFound();
                    }

                    return $this->invoke($this->controller, $this->method, $this->args);
                }
            }


        }
        // if the controller parameter is not set
        // then it will redirect to default controller from config
        else
        {
            $this->controller   = Config::get("DEFAULT_CONTROLLER");
            // if default method empty this will redirect to index method
            $this->method       = config::get("DEFAULT_METHOD");

            header("Location: " . $this->controller . "/" . $this->method);
        }

        // check the url parameters
        // and search for the controller whether it is exists or not

        // if the controller found but does not contain the method
        // return error page with corresponding error code


        // if the requested controller does not exist then return error page
        // contains the corresponding error code

    }

    private function splitUrl()
    {
        // store the url from the request into a variable for further usage
        $url = $this->request->getUri();

        // if the url is not empty then start splitting the url components
        if(!empty($url)){

            $url = explode('/', filter_var(trim($url, '/'), FILTER_SANITIZE_URL));

            $this->controller = !empty($url[1]) ? ucwords($url[1]) : null;
            $this->method = !empty($url[2]) ? $url[2] : null;

            unset($url[0], $url[1], $url[2]);

            $this->args = !empty($url)? array_values($url): [];
        }
    }

    private function validateController($controller)
    {
        // check if the controller parameter is empty or not
        if(!empty($controller))
        {
            if (strtolower($controller) === "errorscontroller" ||
                !file_exists(Config::get("CONTROLLERS_PATH") . $controller . '.php'))
            {
                return false;
            }
            else
            {
                return true;
            }
        }
        else
        {
            return true;
        }
    }

    private function validateMethod($controller, $method)
    {
        // check if the method parameter is empty or not
        if(!empty($method))
        {
            if (!method_exists($controller, $method)  ||
                strtolower($method) === "index" )
            {
                return false;
            }
            else
            {
                return true;
            }
        }
        else
        {
            return true;
        }
    }

    private function validateArgs($controller, $method, $args)
    {
        $reflection = new ReflectionMethod ($controller, $method);
        $_args = $reflection->getNumberOfParameters();

        if($_args == count($args)) { return true; }
        else { return false; }

    }

    private function invoke($controller, $method = "index", $args = [])
    {
        $this->request->addParams(['controller' => $controller, 'action' => $method, 'args' => $args]);
        $this->controller = new $controller($this->request, $this->response);

        // check if the arguments parameters empty or not
        // to specifiy the method for invoking
        if(!empty($args))
        {
            call_user_func_array([$this->controller, $method], $args);
        }
        else
        {
            call_user_func(array($this->controller, $this->method));
        }
    }

    private function errorHandling(){
        //
    }

}
