<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;



require '../../vendor/autoload.php';
require '../../src/config/MySQL.php';

$app = new \Slim\App;


require "../../src/routes/ornekSorgu.php";


$app->run();
?>
