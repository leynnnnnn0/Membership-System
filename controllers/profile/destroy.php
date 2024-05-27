<?php

require 'db/dbhelper.php';
require_once 'model/Profile.php';

use ProfileModel\Profile;

$id = $_POST['id'];

Profile::delete($db, $id);

require_once 'hide.php';


