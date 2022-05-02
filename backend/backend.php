<?php
$GLOBALS['mysqli'] = new mysqli("localhost", "root", "root", "notebook");

function get_users(...$columns): array
{
    $mysqli = $GLOBALS['mysqli'];
    $query = 'SELECT * from users';
    if (count($columns) != 0) {
        $query = sprintf("SELECT %s from users",
            implode(', ', $columns));
    }
    $returned_val = array();

    foreach ($mysqli->query($query) as $row) {
        $returned_val[] = $row;
    }
    return $returned_val;
}

function get_user($user_id, ...$columns): array
{
    $mysqli = $GLOBALS['mysqli'];
    $query = "SELECT * from users where id = $user_id";
    if (count($columns) != 0) {
        $query = sprintf("SELECT %s from users WHERE id = $user_id",
            implode(', ', $columns));
    }
    return $mysqli->query($query)->fetch_assoc();

}

