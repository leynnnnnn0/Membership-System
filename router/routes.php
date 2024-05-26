<?php

$route->get('/membershipsystem/index.php/signin', 'controllers/signin.php')->only('guest');
$route->get('/membershipsystem/index.php/signup', 'controllers/signup.php')->only("guest");
$route->post("/membershipsystem/index.php/create", "controllers/registration/create.php")->only("guest");
$route->post("/membershipsystem/index.php/validation", "controllers/registration/validation.php")->only("guest");
$route->get("/membershipsystem/index.php/dashboard", "controllers/dashboard.php")->only("guest");

