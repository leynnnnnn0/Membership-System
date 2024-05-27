<?php

namespace ProfileModel;
class Profile 
{
    public static function update(object $pdo, $id, $username, $email)
    {
        $query ="UPDATE members SET username = :username, email = :email WHERE id = :id;";
        $result = $pdo->query($query, [":username" => $username, ":email" => $email, ":id" => $id]);
        return $result->fetch();
    }

    public static function delete(object $pdo, string $id)
    {
        $query = "DELETE FROM members WHERE id = :id;";
        $result = $pdo->query($query, [":id" => $id]);
        return $result->fetch();
    }

    public static function show_user(object $pdo, string $id)
    {
        $query = "SELECT * FROM members WHERE id = :id";
        $result = $pdo->query($query, [":id" => $id]);
        return $result->fetch();
    }

    public static function create(object $pdo, string $username, string $email, string $password)
    {
        try {
            $query = "INSERT INTO members (email, username, pass) VALUES (:username, :email, :pass);";
        $hashedPass = password_hash($password, PASSWORD_BCRYPT);
        $result = $pdo->query($query, [":username" => $username, ":email" => $email, ":pass" => $hashedPass]);
        return $result;
        }catch (\PDOException $e) {
            echo "Error: ". $e->getMessage();  
        }
    }
}