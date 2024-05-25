<?php

require_once 'model/Signin.php';
require_once 'db/dbhelper.php';
require_once 'validation/Validation.php';

use Model\Signin;

$email = $_POST['email'];
$password = $_POST['password'];

if(Validation::check_input_fields($email, $password))
{
    echo 'All fields are required';
    die();
}

$result = Signin::validate_email($db,  $email);

if(!$result)
{
    echo 'Could not find email';
    die();
}

if(Validation::validate_password($password, $result['pass'])) {
    echo 'Incorrect password';
    die();
}

echo "Successfully logged in";


