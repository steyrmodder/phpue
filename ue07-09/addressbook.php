<?php
/**
 * Einbinden der define-Angaben für IMAR
 */
require_once 'includes/defines.inc.php';
/**
 * Einbinden des Session-Handlings und der Umleitung auf HTTPS (Port 443)
 */
require_once NORM_DIR . 'session.inc.php';
/**
 * Einbinden der Klasse TNormform, die die Formularabläufe festlegt. Bindet auch Utilities.php ein.
 */
/**
 * Einbinden der Klasse TNormform, die die Formularabläufe festlegt. Bindet auch Utilities.php ein.
 */
require_once TNORMFORM;
/**
 * Einbinden der Datei-Zugriffs-Klasse  FileAccess, die die Dateizugriffe implementiert
 */
require_once FILEACCESS;

/*
 * Das objektorientierte und templatebasierte Addressbook-formular setzt die Eingabe von Adressen in IMAR um.
 * *
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @author Wolfgang Hochleitner <wolfgang.hochleitner@fh-hagenberg.at>
 * @package hm2
 * @version 2017
 */
final class AddressBook extends TNormForm {
    /**
     * Konstanten für ein HTML Attribute z.B:: <input name='pname' id='pname' ... >, <label for='pname' ... >, Keys für $_POST[self::PNAME]..
     *
     * @var string FIRSTNAME Key für $_POST-Array
     * @var string LASTNAME Key für $_POST-Array
     * @var string STREE Key für $_POST-Array
     * @var string ZIP Key für $_POST-Array
     * @var string CITY Key für $_POST-Array
     */
    const FIRSTNAME = 'firstname';
    const LASTNAME = 'lastname';
    const STREET = 'street';
    const ZIP = 'zip';
    const CITY = 'city';

    private $addresses;

    /**
     * AddressBook Constructor.
     *
     * Ruft den Constructor der Klasse TNormform auf.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Weist die Inhalte der Smarty-Variablen zu. @see templates/addressMain.tpl
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    protected function prepareFormFields() {
        $this->smarty->assign("firstnameKey", self::FIRSTNAME);
        $this->smarty->assign("lastnameKey", self::LASTNAME);
        $this->smarty->assign("streetKey", self::STREET);
        $this->smarty->assign("zipKey", self::ZIP);
        $this->smarty->assign("cityKey", self::CITY);
        /*--
        require 'solution/addressbook/show.inc.php';
        //*/
        $this->smarty->assign("addresses", $this->getAddresses());
    }

    /**
     * Zeigt die Seite mittels Smarty Templates an
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    protected function display() {
        $this->smarty->display('addressMain.tpl');
    }

    /**
     * Validiert den Benutzerinput nach dem Abschicken des Formulars.
     *
     * Prüft, ob die Eingabefelder nicht leer sind.
     *
     * Fehlermeldungen werden im Array $errMsg[] gesammelt.
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     *
     * @return bool true, wenn $errMsg leer ist. Ansonsten false
     */
    protected function isValid(): bool {
        /*--
        require 'solution/addressbook/isValid.inc.php';
        //*/
        return (count($this->errMsg) === 0);
    }

    /**
     * Verarbeitet die Benutzereingaben, die mit POST geschickt wurden
     * Wenn alles gut geganden ist, wird eine Statusmeldung geschrieben, ansonsten eine Fehlermeldung.
     *
     * Zuerst wird das aktuelle File /phpue/imar/data/addresses.xml ausgelesen in ein Array @see getAddresses()
     * Dann wird der Neue Datensatz ans Ende dieses Array angehängt @see addAddress()
     * Danach wird das File mit writeAddresses() neu überschrieben mit den Inhalten des Adress-Arrays.
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     *
     * @throws FileAccessException wird von allen $this->fileAccess Methoden geworfen und hier nicht behandelt.
     *         Die Exception wird daher nochmals weitergereicht (throw) und erst am Ende des Scripts behandelt.
     */
    protected function process() {
        $this->getAddresses();
        $this->addAddress();
        $this->writeAddresses();
        $this->statusMsg = "Address added";
    }

    /**
     * Gibt ein Array mit den Adressen aus dem File /phpue/imar/data/addresses.xml zurück
     * Es ist ein Beispielsatz für das Aussehen des Arrays angegeben.
     * $addressArray beinhalte in der Leseschleife immer den aktuellen Datensatz
     *
     * Zum Lesen wird XMLReader genutzt
     *
     * @return array $this->addresses
     */
    private function getAddresses() {
        $this->addresses=[];
        $addressArray=[];
        //##
        $this->addresses = array(0 => array('firstname' => 'Betty', 'lastname' => 'Bertelsmann', 'street' => 'Bergstraße 11', 'zip' => 1111, 'city' => 'Beimberg'), 1 => array('firstname' => 'Harry', 'lastname' => 'Hollunder', 'street' => 'Hauptplatz 33', 'zip' => 3333, 'city' => 'Hinternberg'), 2 => array('firstname' => 'Max', 'lastname' => 'Mustermann', 'street' => 'Moostraße 66', 'zip' => 6666, 'city' => 'Mordsberg'));
        //*/
        /*--
        require 'solution/addressbook/getAddresses.inc.php';
        //*/
        return $this->addresses;
    }

    /**
     * Schreibt die neue Adresse in das Array, das von @see getAddresses() geliefert wird.
     */
    private function addAddress() {
        /*--
        require 'solution/addressbook/addAddress.inc.php';
        //*/
    }

    /**
     * Schreibt die Adressen mit XMLWrite in das File /phpue/imar/data/addresses.xml
     * Dazu wird die neu eingegebene Adresse an die bereits bestehenden angehängt, während das ganze File neu geschrieben wird.
     */
    private function writeAddresses() {
        /*--
        require 'solution/addressbook/writeAddress.inc.php';
        //*/
    }
}
/**
 * Instantiieren der Klasse AddressBook und Aufruf der Methode TNormform::normForm()
 *
 * FileAccess-Exceptions werden erst hier abgefangen und eine formatierte DEBUG-Seite mit den Fehlermeldungen mit echo ausgegeben @see FileAcess::debugFileError()
 * Bei PHP-Exception wird vorerst nur auf eine allgemeine Errorpage weitergeleitet
 */
try {
    $addressBook = new AddressBook();
    $addressBook->normForm();
} catch (FileAccessException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    header("Location: https://localhost/imar/errorpage.html");
}
