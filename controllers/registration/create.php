<?php

require_once 'model/Signup.php';
require 'db/dbhelper.php';

use Model\Signup as SignupModel;

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];


if(Validation::check_input_fields($email, $username, $password))
{
    echo  "Incomplete details";
    die();
}

if(Validation::check_email($email))
{
    echo "Invalid email";
    die();
}

if(Validation::check_password($password))
{
    echo "Long PASSWORD";
    die();
}

if(SignupModel::is_email_unique($db, $password))
{
    echo "Email is already been registered";
    die();
}

SignupModel::create_new_member($db, $email, $username, $password);

// Create a session



