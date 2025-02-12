<?php

if (!isset($_SESSION)) {
    session_start();

} else {
    session_destroy();
    session_start();
}

define ('ROOT_PATH',$_SERVER['DOCUMENT_ROOT']);
include_once("vendor/autoload.php");
$dotenv = Dotenv\Dotenv::createImmutable(ROOT_PATH);
$dotenv->load();

require_once('App/Helpers/Database.php');
require_once('App/Router.php');
require_once('App/Core/Controller.php');
require_once('App/Model/Orm.php');
require_once('App/Model/Project.php');
require_once('App/Model/User.php');
require_once('App/config.php');








use App\Router;

$myRouter = new Router();
$myRouter->run();


