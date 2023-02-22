<?php

$file_name = "data.json";
$json = "[]";

if (file_exists($file_name)) {
    $json = file_get_contents($file_name);
} else {
    file_put_contents($file_name, "[]");
}

$datas = json_decode($json, true);
