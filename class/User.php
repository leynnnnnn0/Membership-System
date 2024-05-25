<?php

class User {
    private $id;
    private $email;
    private $username;
    private $password;
    private $is_admin = false;

    public function __construct(string $id, string $username, string $email, string $password, bool $is_admin = false)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->is_admin = $is_admin;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function isAdmin()
    {
        return $this->is_admin;
    }
}