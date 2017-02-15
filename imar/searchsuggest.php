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
 * Einbinden der Klasse TNormform, die die Formularabläufe festlegt. Bindet auch Utilities.class.php ein.
 */
require_once TNORMFORM;
/**
 * Einbinden der Datei-Zugriffs-Klasse  FileAccess, die die Dateizugriffe implementiert
 */
require_once FILEACCESS;

/*
 * Das objektorientierte und templatebasierte Suchformular setzt eine Suche in Adressen um.
 * *
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @package hm2
 * @version 2017
 */
final class Search extends TNormForm {
    /**
     * Konstanten für ein HTML Attribute z.B:: <input name='pname' id='pname' ... >, <label for='pname' ... >, Keys für $_POST[self::PNAME]..
     *
     * @var string SEARCH Key für $_POST-Array
     */
    const SEARCH = "search";

    private $addresses;

    public function __construct() {
        parent::__construct();
        $this->addresses = [];
    }

    /**
     * Weist die Inhalte der Smarty-Variablen zu. @see templates/searchMain.tpl
     *
     * Der Key für $_GET-Array wird zugewiesen
     * Die Suchergebnisse werden an Smarty übergeben.
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    protected function prepareFormFields() {
        $this->smarty->assign("searchKey", self::SEARCH);
        $this->smarty->assign("addresses", $this->getFilteredSearchResults());
    }

    /**
     * Zeigt die Seite mittels Smarty Templates an
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    protected function display() {
        $this->smarty->display('searchMain.tpl');
    }

    /**
     * Validiert den Benutzerinput nach dem Abschicken des Formulars.
     *
     * Da mit $_GET gearbeitet wird ist keine Validierung an dieser Stelle notwendig.
     *
     * Fehlermeldungen werden im Array $errMsg[] gesammelt.
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     *
     * @return bool true, wenn $errMsg leer ist. Ansonsten false
     */
    protected function isValid(): bool {
        return (count($this->errMsg) === 0);
    }

    /**
     * Verarbeitet die Benutzereingaben, die mit POST geschickt wurden
     * Wenn alles gut geganden ist, wird eine Statusmeldung geschrieben, ansonsten eine Fehlermeldung.
     *
     * Da mit $_GET gearbeitet wird, ist an dieser Stelle keine Verabeitung notwendig.
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     *
     * @throws FileAccessException wird von allen $this->fileAccess Methoden geworfen und hier nicht behandelt.
     *         Die Exception wird daher nochmals weitergereicht (throw) und erst am Ende des Scripts behandelt.
     */
    protected function process() {
        return true;
    }

    /**
     * Zeigt nur noch die Addressbucheinträge an, die mit dem im Suchfeld eingegebenen Begriff übereinstimmen.
     * Da die Einträge aus einem vorgegebenen Array $see $this->getAddresses() angezeigt werden und nicht der $_GET-Wert selbst ist hier keine Eingabeüberprüfung notwendig.
     *
     * @return array Die gefilterten Suchresultate.
     */
    private function getFilteredSearchResults() {
        if (isset($_GET[self::SEARCH]) && $_GET[self::SEARCH] !== "") {
            $entries = [];
            foreach ($this->getAddresses() as $entry) {
                if (mb_stripos($entry['firstname'] . " " . $entry['lastname'], $_GET[self::SEARCH], 0, "UTF-8") !== false || mb_stripos($entry['lastname'] . " " . $entry['firstname'], $_GET[self::SEARCH], 0, "UTF-8") !== false) {
                    $entries[] = $entry;
                }
            }
            return $entries;
        }
        return $this->getAddresses();
    }

    /**
     * Das Address-Array wird hier vorgegeben und nicht wie in @see addressbook.php ausgelesen. Dadurch sind die beiden Aufgabenstellunge vollkommen entkoppelt.
     *
     * @return array gibt ein vorgegebenes Array mit Adressen zurück.
     */
    private function getAddresses() {
        return $this->addresses = array(0 => array('firstname' => 'Betty', 'lastname' => 'Bertelsmann', 'street' => 'Bergstraße 11', 'zip' => 1111, 'city' => 'Beimberg'), 1 => array('firstname' => 'Harry', 'lastname' => 'Hollunder', 'street' => 'Hauptplatz 33', 'zip' => 3333, 'city' => 'Hinternberg'), 2 => array('firstname' => 'Max', 'lastname' => 'Mustermann', 'street' => 'Moostraße 66', 'zip' => 6666, 'city' => 'Mordsberg'));
    }

}
/**
 * Instantiieren der Klasse Search und Aufruf der Methode TNormform::normForm()
 *
 * FileAccess-Exceptions werden erst hier abgefangen und eine formatierte DEBUG-Seite mit den Fehlermeldungen mit echo ausgegeben @see FileAcess::debugFileError()
 * Bei PHP-Exception wird vorerst nur auf eine allgemeine Errorpage weitergeleitet
 */
try {
    $search = new Search();
    $search->normForm();
} catch (FileAccessException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    header("Location: https://localhost/imar/errorpage.html");
}