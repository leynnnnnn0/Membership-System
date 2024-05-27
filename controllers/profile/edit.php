<?php
require_once 'db/dbhelper.php';
require_once 'model/Profile.php';
require_once 'validation/Validation.php';
require_once 'util/session.php';


use ProfileModel\Profile;

$email = $_POST['email'];
$username = $_POST['username'];
$id = $_SESSION['member']['id'];

$errors = [];

if(Validation::check_input_fields($email, $username))
{
    Validation::handle_error($errors, 'All fields are required.', '/membershipsystem/index.php/dashboard');
}

if(Validation::check_email($email))
{
    Validation::handle_error($errors, 'Invalid email.', '/membershipsystem/index.php/dashboard');
}

if(Profile::update($db, $id, $username, $email))
{
    $_SESSION['success'] = 'Successfully created.';
    header('Location: /membershipsystem/index.php/dashboard');
    exit();
}

header('Location: /membershipsystem/index.php/dashboard');