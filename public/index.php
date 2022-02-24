<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

////////////////////PRIVILEGIANDOS///////////////////////////

require_once "../vendor/autoload.php";

use App\Router\Route;
use Nextc\Init\Close;

if (isset($_SESSION['id']) && isset($_SESSION['name'])) {
    Route::setRoute("/inicio", "AppController-inicio");
} else {
    ///////////////////////Router////////////////////////////
    switch (Close::control()) {

            /////////////////////////////////IndexController
        case '/':
            Route::setRoute("/index", "IndexController-index");
            break;
        case '/login':
            Route::setRoute("/login", "IndexController-login");
            break;
        case '/inscreverse':
            Route::setRoute("/inscreverse", "IndexController-inscreverse");
            break;
            //FIM
        default:
            Route::setRoute("/", "IndexController-index");
    }
}
