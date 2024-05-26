<?php

function get_all_members(object $pdo)
{
    $query = "SELECT * FROM members";
    $result = $pdo->query($query);
    return $result->fetchAll();
}