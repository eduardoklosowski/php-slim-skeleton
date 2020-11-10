<?php

use DI\Container;
use Slim\Factory\AppFactory;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../.env');
require __DIR__ . '/../App/config.php';


/* Containers */

$container = new Container();
AppFactory::setContainer($container);
require APP_DIR . '/Containers/Template.php';


/* App */

$app = AppFactory::create();
require APP_DIR . '/Routes/home.php';

$app->run();
