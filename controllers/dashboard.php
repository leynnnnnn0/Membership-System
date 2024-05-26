<?php
require_once 'db/dbhelper.php';
require_once 'model/show.php';

$members = get_all_members($db);
require_once 'views/dashboard.php';