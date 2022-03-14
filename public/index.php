<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

////////////////////PRIVILEGIANDOS///////////////////////////

require_once "../vendor/autoload.php";

use App\Router\Route;
use Nextc\Init\Close;


    ///////////////////////Router////////////////////////////
    switch (Close::control()) {

            /////////////////////////////////IndexController
        case '/':
            Route::setRoute("/index", "IndexController-index");
            break;

        case '/user':
            Route::setRoute("/user", "AppController-user");
            break;

            case '/userlist':
                Route::setRoute("/userlist", "userList/UserController-userList");
                break;

        default:
            Route::setRoute("/", "IndexController-index");
    }

