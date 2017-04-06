<?php

/**
 * Implements base functionality for reading data from a file and writing data back to it.
 *
 * This class reads and writes the address data from and to an XML file. Both methods need to be implemented.
 *
 * @author Wolfgang Hochleitner <wolfgang.hochleitner@fh-hagenberg.at>
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @version 2017
 */
class FileAccess
{
    /**
     * @var string DATA_DIRECTORY Sets the directory where the address data (XML file) is stored.
     */
    const DATA_DIRECTORY = "data/";

    /**
     * @var string ADDRESS_DATA_PATH The full path for the XML file containing addresses
     */
    const ADDRESS_DATA_PATH = self::DATA_DIRECTORY . "addressdata.xml";

    /**
     * Creates a new FileAccess object.
     */
    public function __construct()
    {
        // Intentionally left empty.
    }

    /**
     * Loads the contents of a XML file into an according two-dimensional array. If the file is missing or empty, an
     * empty array is returned.
     * @param string $filename The file that is to be read.
     * @return array Returns a two-dimensional array with the information of the XML file.
     */
    public function loadContents(string $filename): array
    {
        $data = [];

        // TODO: Load the contents of the XML file and create the two-dimensional array.

        /*--
        require '../../phpuesolution/addressbook/loadContents.inc.php';
        //*/

        return $data;
    }

    /**
     * Writes a two-dimensional array of data into an XML file and reports success or failure.
     * @param string $filename The file to be written.
     * @param array $data The array of data that is read.
     * @return bool Returns true if the operation was successful, otherwise false.
     */
    public function storeContents(string $filename, array $data): bool
    {
        // We need to create an absolute path since XMLWriter::openUri can't handle paths like "data/adressdata.xml"
        $filename = dirname($_SERVER["SCRIPT_FILENAME"]) . "/" . $filename;

        // TODO: Write the two-dimensional array into an XML file that corresponds to addressbook.dtd.

        /*--
        return require '../../phpuesolution/addressbook/storeContents.inc.php';
        //*/

        //##
        return true;
        /**/
    }
}
