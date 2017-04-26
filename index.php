<?php

    /*
     * Autoload
     * --------------------
     * After running composer install we can use its autoloading in the project
     */
    require_once __DIR__ . '/vendor/autoload.php';

    /*
     * Define this project configuration paths
     * --------------------
     * Useful for simplifying the path code in your works.
     */
    define('DIR_BASE', __DIR__);
    define('DIR_APP',  DIR_BASE . "/app/");
    define('DIR_HELPER', DIR_BASE . "/core/helper/");
    define('DIR_CONFIG', DIR_BASE . "/app/config/");
    define('DIR_RESOURCES', DIR_BASE . "/app/resources/img/");
    define('ROOTDIR', str_replace("\\", "/", __DIR__) . "/");

    /*
     * Initialize session
     * --------------------
     * get session ready for usage in the project
     */
    Session::init();

    /*
     * Instantiate and run the main file
     * --------------------
     * Once we have the app instance, we can handle the incoming request
     * and send the response back to the client's browser
     */
    $facade = new Facade();
    $facade->run();

?>
