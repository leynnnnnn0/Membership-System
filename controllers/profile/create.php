<?php

require_once 'db/dbhelper.php';
require_once 'model/Profile.php';
require_once 'validation/Validation.php';
require_once 'model/Signup.php';

use Model\Signup;
use ProfileModel\Profile;

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if(Validation::check_input_fields($username, $email, $password))
{
    Validation::handle_error($errors, 'All fields are required.', '/membershipsystem/index.php/addmember');
}

if(Validation::check_email($email))
{
    Validation::handle_error($errors, 'Invalid email.', '/membershipsystem/index.php/addmember');
}

if(Signup::is_email_unique($db, $email))
{
    Validation::handle_error($errors, 'Email is already been used.', '/membershipsystem/index.php/addmember');
}

if(Validation::check_password($password))
{
    Validation::handle_error($errors, 'Password should be at least 8 characters.', '/membershipsystem/index.php/addmember');
}


if(Profile::create($db, $username, $email, $password))
{
    $_SESSION['success'] = 'Successfully created.';
    header('Location: /membershipsystem/index.php/addmember');
    exit();
}

header('Location: /membershipsystem/index.php/addmember');




