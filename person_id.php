<?php
require_once 'backend/backend.php'
?>
<form action="/ajax.php" method="post">
    <input type="hidden" name="method" value="select_person">
    <input type="hidden" name="mode" value="<?= $_GET['mode'] ?>">
    <select name="person_id">
        <?php
        foreach (get_users('id', 'surname', 'name') as $person) {
            $id = $person['id'];
            $fio = $person['surname'] . " " . $person['name'];
            if (array_key_exists('person_id', $_GET)) {
                if (intval($id) === intval($_GET['person_id'])) {
                    echo "<option value='$id' selected>$fio</option>";
                } else {
                    echo "<option value='$id'>$fio</option>";
                }
            } else {
                echo "<option value='$id'>$fio</option>";
            }
        }
        ?>
    </select>
    <button type="submit">
        Выбрать пользователя
    </button>
</form>
