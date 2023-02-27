<?php

require_once("base.php");

$json = "[]";

if (file_exists(FILE_NAME)) {
    $json = file_get_contents(FILE_NAME);
} else {
    file_put_contents(FILE_NAME, "[]");
}

$datas = json_decode($json, true);
