<?php

namespace Model;

class Signup
{
    public static function is_email_unique(object $db, string $email)
    {
        try {
            $query = "SELECT * FROM members WHERE email = :email";
            $result = $db->query($query, [":email" => $email]);
            return $result->fetch();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function create_new_member(object $db, string $email, string $username, string $password)
    {
        try {
            $query = "INSERT INTO members (email, username, pass) VALUES (:email, :username, :pass);";
            $hashedPass = password_hash($password, PASSWORD_BCRYPT);
            $result = $db->query($query, [":email" => $email, ":username" => $username, ":pass" => $hashedPass]);
            return $result;
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
