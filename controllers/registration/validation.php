<?php

require_once 'model/Signin.php';
require_once 'db/dbhelper.php';
require_once 'validation/Validation.php';
require_once 'util/session.php';

use Model\Signin;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if(Validation::check_input_fields($email, $password))
{
    Validation::handle_error($errors, "All fields are required", "/membershipsystem/index.php/signin");
}

$result = Signin::validate_email($db,  $email);

if(!$result)
{
    Validation::handle_error($errors, "Could not find the email address.", "/membershipsystem/index.php/signin");
}

if(Validation::validate_password($password, $result['pass'])) {
    Validation::handle_error($errors, "Incorrect password.", "/membershipsystem/index.php/signin");
}




