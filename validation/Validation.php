<?php

class Validation
{
    public static function check_input_fields(string $str1 = 'value', $str2 = 'value', $str3 = 'value', $str4 = 'value', $str5 = 'value')
    {
        return
        empty($str1) || 
        empty($str2) || 
        empty($str3) || 
        empty($str4) || 
        empty($str5);
    }

    public static function check_password(string $password)
    {
        return !$password >= 8;
    }

    public static function check_email(string $email)
    {
        return !filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    public static function validate_password(string $password, string $hashedPassword)
    {
        return !password_verify($password, $hashedPassword);
    }

    public static function handle_error(array $errors, string $error_message, string $location)
    {
        $errors[] = $error_message;
        $_SESSION['error'] = $errors;
        header('Location: ' . $location);
        die();
    }
}