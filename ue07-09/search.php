<?php

require_once("includes/defines.inc.php");

require_once FILE_ACCESS;

if (isset($_GET["search"]) && $_GET["search"] !== "") {
    $fileAccess = new FileAccess();
    $addresses = $fileAccess->loadContents(FileAccess::ADDRESS_DATA_PATH);

    // In case your UE8 didn't work, remove the line above and use this dummy array below
    /*$addresses = [
        0 => [
            "lastName" => "Bertelsmann",
            "firstName" => "Betty",
            "street" => "Bergstraße 11",
            "zip" => 1111,
            "city" => "Beimberg"
        ],
        1 => [
            "lastName" => "Hollunder",
            "firstName" => "Harry",
            "street" => "Hauptplatz 33",
            "zip" => 3333,
            "city" => "Hinternberg"
        ],
        2 => [
            "lastName" => "Mustermann",
            "firstName" => "Max",
            "street" => "Moostraße 66",
            "zip" => 6666,
            "city" => "Mordsberg"
        ]
    ];*/

    $filteredAddresses = array_filter($addresses, function ($person) {
        if (mb_stripos($person["lastName"] . " " . $person["firstName"], $_GET["search"], 0, "UTF-8") !== false ||
            mb_stripos($person["firstName"] . " " . $person["lastName"], $_GET["search"], 0, "UTF-8") !== false
        ) {
            return true;
        }
        return false;
    });

    sort($filteredAddresses);

    $jsonArray = [];
    foreach ($filteredAddresses as $entry) {
        $jsonArray[] = [
            "lastName" => $entry["lastName"],
            "firstName" => $entry["firstName"],
            "fullName" => $entry["lastName"] . " " . $entry["firstName"]
        ];
    }

    echo json_encode($jsonArray);
}
