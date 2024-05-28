<?php

function get_all_members(object $pdo)
{
    $query = "SELECT * FROM members";
    $result = $pdo->query($query);
    return $result->fetchAll();
}

function get_member(object $pdo, string $id)
{
    $query = "SELECT * FROM members WHERE id = :id";
    $result = $pdo->query($query, [":id" => $id]);
    return $result->fetch();
}

function get_member_by_email_or_username(object $pdo, string $search)
{
    $query = "SELECT * FROM members WHERE email = :email OR username = :username";
    $result = $pdo->query($query, [":email" => $search, ":username" => $search]);
    return $result->fetchAll();
}