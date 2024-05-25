<?php

require_once 'User.php';

class Member extends User
{
    private $membership_tier;
    private $remaining_time;
    private $total_time_consumed;
    public function __construct($username, $email, $password, $membership_tier = "bronze", $remaining_time = 0, $total_time_consumed = 0)
    {
        parent::__construct($username, $email, $password);
        $this->membership_tier = $membership_tier;
        $this->remaining_time = $remaining_time;
        $this->total_time_consumed = $total_time_consumed;
    }

    public function getMembershipTier()
    {
        return $this->membership_tier;
    }

    public function getRemainingTime()
    {
        return $this->remaining_time;
    }

    public function getTotalTimeConsumed()
    {
        return $this->total_time_consumed;
    }
}

