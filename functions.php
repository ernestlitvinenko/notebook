<?php
function get_page_title(): string
{
    return $GLOBALS['modes'][$GLOBALS['curr_mode']];
}


