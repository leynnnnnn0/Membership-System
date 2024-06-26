<?php
require_once 'User.php';

class Admin extends User
{
    private $is_admin;

    public function __construct( $username, $email, $password, $is_admin = true)
    {
        parent::__construct($username, $email, $password);
        $this->is_admin = $is_admin;
    }

    public function getIsAdmin()
    {
        return $this->is_admin;
    }
}