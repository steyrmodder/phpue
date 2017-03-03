<?php
require_once("searchdata.inc.php");

$data = new SearchData();
$titles = $data->getTitles();
sort($titles);

if (isset($_GET["search"]) && $_GET["search"] !== "") {
    foreach ($titles as $entry) {
        if (mb_stripos($entry, $_GET["search"], 0, "UTF-8") !== false) {
            echo $entry . PHP_EOL;
        }
    }
}