<?php

/**
 *
 */
class View
{
    public $controller;

    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }

    public function forge($viewFileName, $data = null)
    {
        if(!empty($data))
        {
            extract($data);
        }

        if(file_exists(Config::get("VIEWS_PATH") . $viewFileName . '.php'))
        {
            ob_start();
            require_once Config::get("VIEWS_PATH")  . $viewFileName . '.php';
            ob_end_flush();
        }
        else
        {
            echo "template view tidak ditemukan";
        }
    }

    public function forgeWithLayouts($layoutName, $data = null)
    {
        ob_start();

        if(!empty($data))
        {
            extract($data);
        }

        if( file_exists(Config::get("VIEWS_PATH") . 'header/' . $headerName . '.php') &&
            file_exists(Config::get("VIEWS_PATH")  . $bodyName . '.php') &&
            file_exists(Config::get("VIEWS_PATH") . 'footer/' . $footerName . '.php'))
        {
            ob_start();
            require_once Config::get("VIEWS_PATH") . 'header/' . $headerName . '.php';
            require_once Config::get("VIEWS_PATH")  . $bodyName . '.php';
            require_once Config::get("VIEWS_PATH") . 'footer/' . $footerName . '.php';
            ob_end_flush();
        }
        else
        {
            echo "Error! Could not completely found view template!";
        }
    }
}

?>
