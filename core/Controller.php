<?php

/**
 * The controller base class for all controllers classes
 * Extend this class for each created controllers
 */
class Controller
{
    protected $view;

    public $request;

    public $response;

    public function __construct(Request $request = null, Response $response = null)
    {
        $this->request      =  $request  !== null ? $request  : new Request();
        $this->response     =  $response !== null ? $response : new Response();
        $this->view         =  new View($this);
    }

    protected function Redirect($url, $code = 302)
    {
        if (strncmp('cli', PHP_SAPI, 3) !== 0)
        {
            if (headers_sent() !== true)
            {
                // if using sessions
                if (strlen(session_id()) > 0)
                {
                    // avoids session fixation attacks
                    session_regenerate_id(true);
                    // avoids having sessions lock other requests
                    session_write_close();
                }

                if (strncmp('cgi', PHP_SAPI, 3) === 0)
                {
                    header(sprintf('Status: %03u', $code), true, $code);
                }

                header(
                    "Location: http://" .
                    $_SERVER['HTTP_HOST'] . "/" .
                    basename(getcwd()) . "/" .
                    $url, (preg_match('~^30[1237]$~', $code) > 0) ? $code : 302);
            }

            exit();
        }
    }

    // this method may be unnecessary because we have used the autoloading
    public function loadModel($modelName)
    {
        $modelPath = Config::get("MODELS_PATH") . $modelName . ".php" ;

        if(file_exists($modelPath))
        {
            require $modelPath;
        }
    }

    // this purpose of this method is to provide the media
    // for loading the helper method inside helper file path
    public function loadHelper($helperName)
    {
        $helperPath = Config::get("HELPERS_PATH")  . $helperName . '_helper.php';

        if(!file_exists($helperPath))
        {
            return false;
        }
        else
        {
            include $helperPath;
        }

        return true;

    }
}

?>
