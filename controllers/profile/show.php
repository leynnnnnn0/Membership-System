<?php
require_once 'db/dbhelper.php';
require_once 'model/Profile.php';

use ProfileModel\Profile;

$id = parse_url($_SERVER['REQUEST_URI'])['query'];
$result = Profile::show_user($db, $id);

$_SESSION['member'] = $result;
header('Location: /membershipsystem/index.php/dashboard');
exit();


 