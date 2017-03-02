<?php

require_once("Person.php");

// Die XML Datei in die geschrieben und aus der gelesen wird
define("FILENAME", "addressbook.xml");


// Die Adressbuchdaten - Pro Person ein Objekt...
$person1 = new Addressbook\Person("male", "Huber", "Bernd", "bhuber@diefirma.at");
$person2 = new Addressbook\Person("female", "Mayr", "Hedwig", "hmayr@diefirma.at");
$person3 = new Addressbook\Person("male", "Mustermann", "Max", "max@mustermann.at");

// ... zusammengefügt in ein Array mit Personen aus dem die XML-Datei erzeugt wird
$sourceAddressbook = [$person1, $person2, $person3];

// Und ein neues globales Adressbuch, für den umgekehrten Vorgang (aus XML lesen, Array mit Objekten erzeugen)
$targetAddressbook = null;


//-----------------------------------------------------------------------------
// XML schreiben
//-----------------------------------------------------------------------------

/**
 * Das Array mit Person-Objekten $addressBook wird in eine XML Datei geschrieben.
 * Das Schema der Datei ist in addressbook.dtd festgelegt.
 */
function writeToXMLFile() {
    global $sourceAddressbook;

    // Erstelle ein XMLWriter-Objekt
    $writer = new XMLWriter();

    // Teile dem XMLWriter mit, wo er das XML-Dokument hinschreiben soll (hier: in eine Datei)
    $writer->openUri(FILENAME);

    // Der XMLWriter soll beim Schreiben die Elemente einrücken und in neue Zeilen schreiben
    $writer->setIndent(true);

    // Starte das Dokument mit der XML-Deklaration mit Version und Zeichensatz
    $writer->startDocument("1.0", "UTF-8");
    // Schreibe die DTD, auf der das Dokument aufbaut
    $writer->writeDtd("contacts", null, "addressbook.dtd");

    // Starte das root-Element <contacts>
    $writer->startElement("contacts");
    // Laufe nun über das Array mit allen Einträgen durch...
    foreach ($sourceAddressbook as $person) {
        // Öffne das <person>-Element
        $writer->startElement("person");
        // Erstelle ein neues Attribut namens "gender" und schreibe die Eigenschaft aus dem Objekt hinein
        $writer->writeAttribute("gender", $person->gender);
        // Öffne das Element <name>
        $writer->startElement("name");
        // Erstelle das Element <last> und schreibe den Familiennamen hinein
        $writer->writeElement("last", $person->lastname);
        // Erstelle das Element <first> und schreibe den Vornamen hinein
        $writer->writeElement("first", $person->firstname);
        // Schließe das Element <name> wieder
        $writer->endElement();
        // Erstelle das Element <email> und schreibe die Email-Adresse hinein
        $writer->writeElement("email", $person->email);
        // Schließe das Element <person> wieder
        $writer->endElement();
    }
    // Nachdem alle <person>-Elemente erzeugt wurden, schließe das <contacts>-Element wieder
    $writer->endElement();

    // Schließe das Dokument
    $writer->endDocument();

    // Leere den vom XMLWriter angelegten Zwischenspeicher und erzwinge Schreiben in die Datei
    $writer->flush();
}

//-----------------------------------------------------------------------------
// XML lesen
//-----------------------------------------------------------------------------

/**
 * Die Datei addressbook.xml wird ausgelesen und ein neues Array "$targetAddressbook" wird angelegt.
 */
function readFromXMLFile() {
    global $targetAddressbook;

    // Ein neues XMLReader Objekt wird angelegt
    $reader = new XMLReader();

    // Die XML-Datei zum Auslesen wird geöffnet
    $reader->open(FILENAME, "UTF-8");

    // Zwei Hilfsvariablen zur Speicherung einer Person und des aktuell offenen Elements werden angelegt
    $person = null;
    $openElement = null;

    // Die Methode read() springt so lange von einem Knoten zum nächsten, bis das Ende der Datei erreicht ist
    // In jedem Durchlauf der Schleife wird somit ein Knoten abgehandelt. Knoten können öffnende Elemente, Text,
    // schließende Elemente, Leer- und Steuerzeichen, DOCTYPEs etc. sein.
    while ($reader->read()) {
        switch ($reader->nodeType) {
            // Wenn es sich beim aktuellen Knoten um ein Element handelt...
            case XMLReader::ELEMENT:
                switch ($reader->name) {
                    // ... und dieses Element <contacts> ist...
                    case "contacts":
                        // ... lege das Array erstmalig an (passiert garantiert nur 1x, da nur 1 <contacts>-Element
                        $targetAddressbook = [];
                        break;
                    // ... wenn das Element <person> ist...
                    case "person":
                        // Erzeuge ein neues Objekt für diese Person und frage gleich das Attribut "gender" ab und setze es
                        $person = new Addressbook\Person();
                        $person->gender = $reader->getAttribute("gender");
                        break;
                    // .. wenn das Element <last>, <first> oder <email> ist...
                    case "last":
                    case "first":
                    case "email":
                        // ... merke einfach nur in einer Variable, dass dieses Element gerade geöffnet wurde
                        $openElement = $reader->name;
                        break;
                }
                break;
            // Wenn es sich beim aktuellen Knoten um Text handelt...
            case XMLReader::TEXT:
                // ... schau nach, welches Element gerade vorhin geöffnet wurde (Text steht ja immer nach einem öffnenden Element)...
                switch ($openElement) {
                    case "last":
                        // ... und setze Nachname ...
                        $person->lastname = $reader->value;
                        break;
                    case "first":
                        // ... Vorname ...
                        $person->firstname = $reader->value;
                        break;
                    case "email":
                        // ... und E-Mail-Adresse ...
                        $person->email = $reader->value;
                        break;
                }
                break;
            // Wenn es sich beim aktuellen Knoten um ein schließendes Element handelt...
            case XMLReader::END_ELEMENT:
                $openElement = null;
                // ... und dieses Element </person> ist...
                if (strcmp($reader->name, "person") === 0) {
                    // ... dann ist das Person-Objekt fertig und kann ins Array $targetAdressbook gehängt werden
                    $targetAddressbook[] = $person;
                }
                break;
        }
    }
    // Wenn read() nicht mehr liefert und somit die while-Schleife verlassen wird, schließe die vom Reader geöffnete XML-Datei
    $reader->close();
}


//-----------------------------------------------------------------------------
// HTML Datei ausgeben
//-----------------------------------------------------------------------------

function printAddressBook($book) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Address Book with XML</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <main>
        <h1>Address Book</h1>
        <?php foreach ($book as $person) { ?>
            <section>
                <h2><?= $person->lastname ?> <?= $person->firstname ?></h2>
                <p><strong>Gender:</strong> <?= $person->gender ?></p>
                <p><strong>Email:</strong> <a href="<?= $person->email ?>"><?= $person->email ?></a></p>
            </section>
        <?php } ?>
    </main>
    </body>
    </html>
    <?php
}

//-----------------------------------------------------------------------------
// Funktionen aufrufen
//-----------------------------------------------------------------------------

// Schreibe globales Array $sourceAddressbook in die XML-Datei
writeToXMLFile();
// Lies XML-Datei wieder retour in die Variable $targetAddressbook
readFromXMLFile();
// Stelle den Inhalt von $targetAddressbook in HTML dar
printAddressBook($targetAddressbook);