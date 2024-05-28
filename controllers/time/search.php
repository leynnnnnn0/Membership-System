<?php

require_once 'model/show.php';
require_once 'db/dbhelper.php';
require_once 'util/session.php';

$query = $_POST['search'];

$result = get_member_by_email_or_username($db, $query);

$_SESSION['search_result'] = $result;

header('Location: /membershipsystem/index.php/time');