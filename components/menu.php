<?php

function menu($menu_class_name = "list", $item_class_name = "", $list = NULL): string
{
    $default_menu_list = array(
        "Просмотр" => array(
            'href' => "?mode=0"
        ),
        "Добавление записи" => array(
            'href' => "?mode=1"
        ),
        "Редактирование записи" => array(
            'href' => "?mode=2"
        ),
        "Удаление записи" => array(
            'href' => "?mode=3"
        ),
    );

    if (is_null($list)) {
        $list = $default_menu_list;
    }
    $menu_items = [];

    foreach ($list as $text => $options) {
        $href = $options['href'];
        $menu_items[] = "<li class='$item_class_name'><a href='$href'>$text</a></li>";
    }
    return sprintf("<ul class='$menu_class_name'>%s</ul>", implode("", $menu_items));
}


