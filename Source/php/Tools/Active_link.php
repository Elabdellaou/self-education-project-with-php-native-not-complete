<?php
$page = "";
function activeLink($link = "home")
{
    if ($GLOBALS['page'] == $link)
        return  'active';

    return '';
}
