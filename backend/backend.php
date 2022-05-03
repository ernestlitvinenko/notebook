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

function add_user($content = array())
{
    $mysqli = $GLOBALS['mysqli'];
    $keys = implode(', ', array_keys($content));
    $values = array_map(fn($u) => "'" . $u . "'", array_values($content));
    $values = implode(', ', $values);
    $query = "INSERT INTO users ($keys) values($values)";
    echo $query;
    return $mysqli->query($query);
}

function edit_user($user_id, $content)
{
    $mysqli = $GLOBALS['mysqli'];
    $setters = array();
    foreach ($content as $key => $val) {
        $setters[] = $key . " = " . "'" . $val . "'";
    }
    $set_str = implode(', ', $setters);


    $query = "UPDATE users SET $set_str where id = $user_id";
    echo $query;
    return $mysqli->query($query);
}

function delete_user($user_id)
{
    $mysqli = $GLOBALS['mysqli'];
    $query = "DELETE FROM users where id = $user_id";
    return $mysqli->query($query);
}