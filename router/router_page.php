<?php

require_once 'Router.php';
$route = new Router();
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
require_once 'routes.php';
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$route->route($uri, $method);



