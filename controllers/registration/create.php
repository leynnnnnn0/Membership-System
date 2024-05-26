<?php

require_once 'model/Signup.php';
require 'db/dbhelper.php';
require_once 'util/session.php';
require_once 'validation/Validation.php';

use Model\Signup as SignupModel;

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$errors = [];

if(Validation::check_input_fields($email, $username, $password))
{
    Validation::handle_error($errors, 'All fields are required.', '/membershipsystem/index.php/signup');
}

if(Validation::check_email($email))
{
    Validation::handle_error($errors, 'Invalid email.', '/membershipsystem/index.php/signup');
}

if(SignupModel::is_email_unique($db, $password))
{
    Validation::handle_error($errors, 'Email is already registered.', '/membershipsystem/index.php/signup');
}

if(Validation::check_password($password))
{
    Validation::handle_error($errors, 'Password should be at least 8 characters.', '/membershipsystem/index.php/signup');
}

SignupModel::create_new_member($db, $email, $username, $password);
$_SESSION['success'] = 'Successfully created.';



