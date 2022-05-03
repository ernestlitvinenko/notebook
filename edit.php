<?php
$user = array(
    "surname" => "",
    'name' => "",
    "fathers_name" => "",
    "sex" => "",
    "birth" => "",
    "address" => "",
    "comment" => "",
);
$methods = array(
    1 => 'add_to_db',
    2 => 'edit_in_db',
    3 => 'delete_in_db',
);
if (array_key_exists('person_id', $_GET)) {
    $user = get_user($_GET['person_id']);
}
?>
<form action="/ajax.php" method="post">
    <input type="hidden" name="method" value="<?= $methods[$_GET['mode']] ?>">
    <?php if ($_GET['mode'] > 1) {
        echo "<input type='hidden' name='person_id' value='" . $_GET['person_id'] . "'>";
    } ?>
    <input class="form-control mb-2" type="text" name="surname" placeholder="Фамилия" value="<?= $user['surname'] ?>"
           required>
    <input class="form-control mb-2" type="text" name="name" placeholder="Имя" value="<?= $user['name'] ?>" required>
    <input class="form-control mb-2" type="text" name="fathers_name" placeholder="Отчество"
           value="<?= $user['fathers_name'] ?>" required>
    <p>Пол</p>
    <label class="mb-2">
        Мужской
        <input type="radio" name="sex" value="m" <?php if ($user['sex'] === 'm') echo 'checked' ?>>
    </label>
    <label class="mb-2">
        Женский
        <input type="radio" name="sex" value="f" <?php if ($user['sex'] === 'f') echo 'checked' ?>>
    </label>
    <label class="mb-2">
        Дата рождения
        <input class="form-control" type="date" name="birth" value="<?= $user['birth'] ?>">
    </label>
    <label class="mb-2">
        Адрес
        <input class="form-control" type="text" name="address" value="<?= $user['address'] ?>">
    </label>
    <label class="mb-2">
        Комментарий
        <textarea class="form-control" name="comment" cols="30" rows="10"
                  placeholder="Введите ваш комментарий"><?= $user['comment'] ?></textarea>

    </label>
    <button class="btn btn-outline-secondary" type="submit">
        Отправить
    </button>
</form>
