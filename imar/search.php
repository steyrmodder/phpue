<?php
$addresses = array(0 => array('firstname' => 'Betty', 'lastname' => 'Bertelsmann', 'street' => 'Bergstraße 11', 'zip' => 1111, 'city' => 'Beimberg'), 1 => array('firstname' => 'Harry', 'lastname' => 'Hollunder', 'street' => 'Hauptplatz 33', 'zip' => 3333, 'city' => 'Hinternberg'), 2 => array('firstname' => 'Max', 'lastname' => 'Mustermann', 'street' => 'Moostraße 66', 'zip' => 6666, 'city' => 'Mordsberg'));

if (isset($_GET["search"]) && $_GET["search"] !== "") {

    $filteredAddresses = array_filter($addresses, "matchesPerson");
    sort($filteredAddresses);

    $jsonArray = [];
    foreach ($filteredAddresses as $entry) {
        $jsonArray[] = ["firstname" => $entry['firstname'], "lastname" => $entry['lastname'], "fullname" => $entry['firstname'] . " " . $entry['lastname']];
    }

    echo json_encode($jsonArray);
}

/**
 * Callback-Funktion für array_filter, die Überprüft, ob ein Wort (aus $_GET["term"]) in Vor- und Nachname der Person
 * enthalten ist
 * @param array $person Die zu überprüfende Person.
 * @return bool Gibt true zurück, falls der String enthalten ist, ansonsten false.
 */
function matchesPerson($person) {
    if (mb_stripos($person['firstname'] . " " . $person['lastname'], $_GET["search"], 0, "UTF-8") !== false || mb_stripos($person['lastname'] . " " . $person['firstname'], $_GET["search"], 0, "UTF-8") !== false) {
        return true;
    }
    return false;
}