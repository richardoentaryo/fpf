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

        require_once Config::get("VIEWS_PATH") . 'header/' . $layoutName . '_header.php';
        require_once Config::get("VIEWS_PATH")  . $layoutName . '.php';
        require_once Config::get("VIEWS_PATH") . 'footer/' . $layoutName . '_footer.php';
        return ob_get_clean();
    }
}

?>
