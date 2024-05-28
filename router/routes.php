<?php

$route->get('/membershipsystem/index.php/signin', 'controllers/signin.php')->only('guest');
$route->get('/membershipsystem/index.php/signup', 'controllers/signup.php')->only("guest");
$route->post("/membershipsystem/index.php/create", "controllers/registration/create.php")->only("guest");
$route->post("/membershipsystem/index.php/validation", "controllers/registration/validation.php")->only("guest");
$route->get("/membershipsystem/index.php/dashboard", "controllers/dashboard.php")->only("guest");
$route->get("/membershipsystem/index.php/addmember", "controllers/addmember.php")->only("guest");
$route->post("/membershipsystem/index.php/dashboard/editprofile", "controllers/profile/show.php")->only("guest");
$route->put("/membershipsystem/index.php/dashboard/edit", "controllers/profile/edit.php")->only("guest");
$route->delete("/membershipsystem/index.php/dashboard/hide", "controllers/profile/hide.php")->only("guest");
$route->post("/membershipsystem/index.php/dashboard/delete", "controllers/profile/destroy.php")->only("guest");
$route->post("/membershipsystem/index.php/addmember/create", "controllers/profile/create.php")->only("guest");
$route->get("/membershipsystem/index.php/time", "controllers/settime.php")->only("guest");

$route->post("/membershipsystem/index.php/time/search", "controllers/time/search.php")->only("guest");



