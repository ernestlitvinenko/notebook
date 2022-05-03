<?php

echo "<div class='row'>";
foreach (get_users('id', 'name', 'surname') as $person) {
    $id = $person['id'];
    $name = $person['name'];
    $surname = $person['surname'];

    echo "<a href='?mode=4&person_id=$id'>$surname $name</a>";
}
echo "</div>";