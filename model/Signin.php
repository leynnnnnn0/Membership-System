<?php

namespace Model;

class Signin
{
    public static function validate_email(object $pdo, string $email)
    {
        $query = "SELECT * FROM members WHERE email = :email";
        $result = $pdo->query($query, [":email" => $email]);
        return $result->fetch();
    } 
}
