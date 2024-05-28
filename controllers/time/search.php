<?php

require_once 'model/show.php';
require_once 'db/dbhelper.php';

$query = $_POST['search'];

$result = get_member_by_email_or_username($db, $query);

