<?php

require_once("includes/defines.inc.php");

require_once UTILITIES;
require_once NORM_FORM;
require_once FILE_ACCESS;

/**
 * Main file for a simple, searchable addressbook.
 *
 * This class represents an addressbook where new entries can be added and existing ones are shown as cards below. Data
 * is stored in XML files, jQuery is used to enhance the front end and provide AJAX search suggest features.
 *
 * @author Wolfgang Hochleitner <wolfgang.hochleitner@fh-hagenberg.at>
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @version 2017
 */
final class AddressBook extends AbstractNormForm
{

    /**
     * @var string LAST_NAME Form field constant that defines how the form field for holding the last name is called
     * (id/name).
     */
    const LAST_NAME = "lastName";

    /**
     * @var string FIRST_NAME Form field constant that defines how the form field for holding the first name is called
     * (id/name).
     */
    const FIRST_NAME = "firstName";

    /**
     * @var string STREET Form field constant that defines how the form field for holding the street is called
     * (id/name).
     */
    const STREET = "street";

    /**
     * @var string ZIP Form field constant that defines how the form field for holding the zip code is called
     * (id/name).
     */
    const ZIP = "zip";

    /**
     * @var string CITY Form field constant that defines how the form field for holding the city name is called
     * (id/name).
     */
    const CITY = "city";

    /**
     * @var string SEARCH Form field constant that defines how the form field for holding the search term is called
     * (id/name).
     */
    const SEARCH = "search";

    /**
     * @var FileAccess $fileAccess The object handling all file access operations.
     */
    private $fileAccess;

    /**
     * Creates a new AddressBook object based on AbstractNormForm. Takes a View object that holds the information about
     * which template will be shown and which parameters (e.g. for form fields) are passed on to the template.
     * The constructor needs to initialize the object for file handling.
     * @param View $defaultView The default View object with information on what will be displayed.
     * @param string $templateDir The Smarty template directory.
     * @param string $compileDir The Smarty compiled template directory.
     */
    public function __construct(View $defaultView, $templateDir = "templates", $compileDir = "templates_c")
    {
        parent::__construct($defaultView, $templateDir, $compileDir);

        // TODO: Do the necessary initializations in the constructor.

        //--
        require '../../phpuesolution/addressbook/construct.inc.php';
        //*/

        $this->currentView->setParameter(new GenericParameter("addresses", $this->getAddresses()));
    }

    /**
     * Validates user input after adding a new addressbook entry. This function has to check for empty entries in order
     * to prevent them. If an error occurs, an error message is set in the member variable $errorMessages. Error
     * messages are then passed on to the view to show them in the template.
     * @return bool Returns true if no errors occurred and therefore no error messages were set, otherwise false.
     */
    protected function isValid(): bool
    {
        // TODO: The code for correct form validation goes here. Check for empty fields.

        //--
        require '../../phpuesolution/addressbook/isValid.inc.php';
        //*/

        $this->currentView->setParameter(new GenericParameter("errorMessages", $this->errorMessages));

        return (count($this->errorMessages) === 0);
    }

    /**
     * This method is only called when the form input was validated successfully. It adds the newly added addressbook
     * entry, creates a status message for showing success and updates the View object with the status message and the
     * updated array of addresses. The form fields are updated with an empty parameter so that their content is deleted.
     */
    protected function business()
    {
        if ($this->addAddress()) {
            $this->statusMessage = "New address book entry successfully created!";
            $this->currentView->setParameter(new GenericParameter("statusMessage", $this->statusMessage));
            $this->currentView->setParameter(new GenericParameter("addresses", $this->getAddresses()));
            $this->currentView->setParameter(new PostParameter(AddressBook::LAST_NAME, true));
            $this->currentView->setParameter(new PostParameter(AddressBook::FIRST_NAME, true));
            $this->currentView->setParameter(new PostParameter(AddressBook::STREET, true));
            $this->currentView->setParameter(new PostParameter(AddressBook::ZIP, true));
            $this->currentView->setParameter(new PostParameter(AddressBook::CITY, true));
        } else {
            $this->errorMessages ["addEntry"] = "Error adding new entry. Please try again";
        }
    }

    /**
     * Returns the two-dimensional array containing the stored addresses. This methods uses the loadContents method
     * provided by the FileAccess class to read the XML data from the file and returns it. Later on this method can
     * filter the results so that only addresses that match the entered search term are returned.
     * @return array The two-dimensional array containing all information about the uploaded images.
     */
    private function getAddresses(): array
    {
        $addressArray = $this->fileAccess->loadContents(FileAccess::ADDRESS_DATA_PATH);

        if (isset($_GET[self::SEARCH]) && $_GET[self::SEARCH] !== "") {
            $addressArray = array_filter($addressArray, function ($person) {
                if (mb_stripos($person["lastName"] . " " . $person["firstName"], $_GET["search"], 0, "UTF-8") !== false ||
                    mb_stripos($person["firstName"] . " " . $person["lastName"], $_GET["search"], 0, "UTF-8") !== false
                ) {
                    return true;
                }
                return false;
            });
        }

        return $addressArray;
    }

    /**
     * Adds a new addressbook entry to the image archive. This method creates a new entry in the two-dimensional address
     * array by retrieving the data provided by the form (last name, first name, street, zip code, city). After the
     * entry is created, the updated two-dimensional array is sorted and stored again in the XML file.
     * @return bool Returns true if the operation was successful, otherwise false.
     */
    private function addAddress(): bool
    {
        // TODO: Add a new address entry to the two-dimensional array, sort and store it.

        //--
        return require '../../phpuesolution/addressbook/addAddress.inc.php';
        //*/

        /*##
        return true;
        //*/
    }
}

// --- This is the main call of the norm form process

// Defines a new view that specifies the template and the parameters that are passed to the template
$view = new View(View::FORM, "indexMain.tpl", [
    new PostParameter(AddressBook::LAST_NAME),
    new PostParameter(AddressBook::FIRST_NAME),
    new PostParameter(AddressBook::STREET),
    new PostParameter(AddressBook::ZIP),
    new PostParameter(AddressBook::CITY),
    new GenericParameter("searchKey", AddressBook::SEARCH)
]);

// Creates a new AdressBook object and triggers the NormForm process
$addressBook = new AddressBook($view);
$addressBook->normForm();
