<?php

$route->get('/membershipsystem/index.php/signin', 'controllers/signin.php')->only('guest');
$route->get('/membershipsystem/index.php/signup', 'controllers/signup.php')->only("guest");

