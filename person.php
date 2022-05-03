<?php $row = get_user($_GET['person_id']) ?>
<table class="w-100 text-center">
    <tr>
        <td>Поле</td>
        <td>Значение</td>
    </tr>
    <tr>
        <td>ФИО</td>
        <td><?= $row['surname'] . " " . $row['name'] . " " . $row['fathers_name'] ?></td>
    </tr>
    <tr>
        <td>Пол</td>
        <td><?= $row['sex'] ?></td>
    </tr>
    <tr>
        <td>Дата рождения</td>
        <td><?= $row['birth'] ?></td>
    </tr>

    <tr>
        <td>Адрес</td>
        <td><?= $row['address'] ?></td>
    </tr>
    <tr>
        <td>Комментарий</td>
        <td><?= $row['comment'] ?></td>
    </tr>

</table>

