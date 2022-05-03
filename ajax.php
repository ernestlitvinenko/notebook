<?php
require 'backend/backend.php';
if ($_POST['method'] === 'add_to_db') {
//    form query
    $query = array();
    $available_data = ['name', 'surname', 'fathers_name', 'sex', 'birth', 'phone', 'address', 'comment'];
    foreach ($_POST as $key => $val) {
        if (in_array($key, $available_data) && strlen($val) > 0) {
            $query[$key] = $val;
        }
    }
    add_user($query);
    header("Location: /");
}
if ($_POST['method'] === 'select_person') {
    header("Location: /?mode=" . $_POST['mode'] . "&person_id=" . $_POST['person_id']);
}
if ($_POST['method'] === 'edit_in_db') {

    $query = get_user($_POST['person_id']);
    $new_query = array();
    $available_data = ['name', 'surname', 'fathers_name', 'sex', 'birth', 'phone', 'address', 'comment'];
    foreach ($_POST as $key => $val) {
        if (in_array($key, $available_data) && strlen($val) > 0) {
            if ($query[$key] != $val) {
                $new_query[$key] = $val;
            }
        }
    }
    edit_user($_POST['person_id'], $new_query);
    header("Location: /");
}
if ($_POST['method'] === 'delete_in_db') {
    delete_user($_POST['person_id']);
    header("Location: /");
}