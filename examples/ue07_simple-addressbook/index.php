<?php

/**
 * Writes the contents of an array to an XML file and reads it back.
 *
 * This file calls functions to write an XML file based on the contents of an array and also implements the reverse
 * process of creating an array out of this XML file.
 * @author Wolfgang Hochleitner <wolfgang.hochleitner@fh-hagenberg.at>
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @version 2017
 */

/**
 * This function from the PHP Standard Library (SPL) is an autoloader. It loads classes from a given namespace. It
 * expects those classes to be in the according subdirectories according to the PSR-4 recommendation. This is the
 * simplest possible autoloader, for a more robust example see
 * https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-examples.md.
 * For this to work make sure that "." is in your php.ini's include path, e.g. include_path = ".;C:\xampp\php\PEAR".
 */
spl_autoload_register(function ($class) {
    require_once $class . ".php";
});


//-----------------------------------------------------------------------------
// Defines
//-----------------------------------------------------------------------------

/**
 * @var string FILENAME The XML file that's being written and read from.
 */
define("FILENAME", "addressbook.xml");


//-----------------------------------------------------------------------------
// Global variables
//-----------------------------------------------------------------------------

// The address book data is being created. One object per person...
$person1 = new SimpleAddressBook\Person("male", "Huber", "Bernd", "bhuber@diefirma.at");
$person2 = new SimpleAddressBook\Person("female", "Mayr", "Hedwig", "hmayr@diefirma.at");
$person3 = new SimpleAddressBook\Person("male", "Mustermann", "Max", "max@mustermann.at");

// ... merged into an array with persons used to create the source address book.
$sourceAddressBook = [$person1, $person2, $person3];

// This is address book will be used for the reverse process (read from XML, create array)
$targetAddressBook = null;


//-----------------------------------------------------------------------------
// Write XML
//-----------------------------------------------------------------------------

/**
 * The array with Person objects in $sourceAddressbook will be written to an XML file. The structure is defined in
 * addressbook.dtd.
 */
function writeToXMLFile()
{
    global $sourceAddressBook;

    // Create a new XMLWriter object
    $writer = new XMLWriter();

    // Tell the writer where the XML document should be written to (here it's a file)
    $writer->openUri(FILENAME);

    // The XMLWriter should indent elements and place them in new lines
    $writer->setIndent(true);

    // Start a new document with an XML declaration and the character set
    $writer->startDocument("1.0", "UTF-8");
    // Write the DTD that the document is based upon
    $writer->writeDtd("contacts", null, "addressbook.dtd");

    // Start the root element <contacts>
    $writer->startElement("contacts");
    // Iterate over the array with the Person entries
    foreach ($sourceAddressBook as $person) {
        // Open the <person> element
        $writer->startElement("person");
        // Create a new attribute called "gender" and store the content from the object in it
        $writer->writeAttribute("gender", $person->gender);
        // Open the <name> element
        $writer->startElement("name");
        // Create the element <last> and insert the last name
        $writer->writeElement("last", $person->lastName);
        // Create the element <first> and insert the first name
        $writer->writeElement("first", $person->firstName);
        // Close the <name> element
        $writer->endElement();
        // Create the <email> element and use the e-mail address as content
        $writer->writeElement("email", $person->email);
        // Close the <person> element
        $writer->endElement();
    }
    // After all <person> elements were created close the <contacts> element
    $writer->endElement();

    // Close the document
    $writer->endDocument();

    // Flush the cache that was created by XMLWriter and output it into the file
    $writer->flush();
}

//-----------------------------------------------------------------------------
// Read XML
//-----------------------------------------------------------------------------

/**
 * Reads from addressbook.xml and creates the array in $targetAddressBook with the parsed content.
 */
function readFromXMLFile()
{
    global $targetAddressBook;

    // Create a new XMLReader object
    $reader = new XMLReader();

    // Open the XML file for reading
    $reader->open(FILENAME, "UTF-8");

    // An auxilliary variable for storing a single person
    $person = null;

    /**
     * read() will continue jumping from one node to the next until the end of the file is reach. Every cycle therefore
     * processes one node. Nodes can be opening elements, text, closing elements, spacing characters, DOCTYPES, etc.
     */
    while ($reader->read()) {
        switch ($reader->nodeType) {
            // If the current node is an opening element...
            case XMLReader::ELEMENT:
                switch ($reader->name) {
                    // ... and this element is <contacts>...
                    case "contacts":
                        // ... initialize the array. This will happen only once since there's only 1 <contacts> element.
                        $targetAddressBook = [];
                        break;
                    // If the element is <person>...
                    case "person":
                        // ... create a new object for this person and query the attribute gender and store it
                        $person = new SimpleAddressBook\Person();
                        $person->gender = $reader->getAttribute("gender");
                        break;
                    // If it's either <last>, <first> or <email> read the content and store it in the object
                    case "last":
                        $person->lastName = $reader->readString();
                        break;
                    case "first":
                        $person->firstName = $reader->readString();
                        break;
                    case "email":
                        $person->email = $reader->readString();
                        break;
                }
                break;
            // If the current node is a closing element...
            case XMLReader::END_ELEMENT:
                // ... and it's </person>...
                if ($reader->name === "person") {
                    // ... write our finished person object to the array in $targetAddressbook
                    $targetAddressBook[] = $person;
                }
                break;
        }
    }
    // Once read() is finished and the loop is left, close the open XML file
    $reader->close();
}


//-----------------------------------------------------------------------------
// Print the address book
//-----------------------------------------------------------------------------

/**
 * Outputs a very simple version of the address book for display purposes.
 * @param array $book The address book array used for display.
 */
function printAddressBook(array $book)
{
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
                <h2><?= $person->lastName ?> <?= $person->firstName ?></h2>
                <p><strong>Gender:</strong> <?= $person->gender ?></p>
                <p><strong>E-mail:</strong> <a href="<?= $person->email ?>"><?= $person->email ?></a></p>
            </section>
        <?php } ?>
    </main>
    </body>
    </html>
    <?php
}

//-----------------------------------------------------------------------------
// Main call for functions
//-----------------------------------------------------------------------------

// Write the global array $sourceAddressBook to the XML file
writeToXMLFile();
// Read the XML file back into the variable $targetAddressBook
readFromXMLFile();
// Display the contents of $targetAddressBook in HTML
printAddressBook($targetAddressBook);
