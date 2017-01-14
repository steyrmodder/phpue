<?php
/*
 * Das objektorientierte und templatebasierte Suchformular setzt eine Suche in Adressen um.
 * *
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @package hm2ue
 * @version 2017
 */
require_once 'includes/defines.inc.php';
require_once NORM_DIR . 'session.inc.php';
require_once UTILITIES;
require_once TNORMFORM;
require_once FILEACCESS;

final class Search extends TNormForm {
    /**
     *  Konstante für ein HTML Attribut <input name=SEARCH>
     */
    const SEARCH = "search";

    private $addresses;

    public function __construct() {
        parent::__construct();
        $this->addresses = [];
    }

    protected function prepareFormFields() {
        $this->smarty->assign("searchKey", self::SEARCH);
        $this->smarty->assign("addresses", $this->getFilteredSearchResults());
    }

    protected function display() {
        $this->smarty->display('searchMain.tpl');
    }

    protected function isValid() {
        return (count($this->errMsg) === 0);
    }

    protected function process() {
        return true;
    }

    /**
     * Zeigt nur noch die Addressbucheinträge an, die mit dem im Suchfeld eingegebenen Begriff übereinstimmen.
     * @return array Die gefilterten Suchresultate.
     */
    protected function getFilteredSearchResults() {
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

    private function getAddresses() {
        return $this->addresses = array(0 => array('firstname' => 'Betty', 'lastname' => 'Bertelsmann', 'street' => 'Bergstraße 11', 'zip' => 1111, 'city' => 'Beimberg'), 1 => array('firstname' => 'Harry', 'lastname' => 'Hollunder', 'street' => 'Hauptplatz 33', 'zip' => 3333, 'city' => 'Hinternberg'), 2 => array('firstname' => 'Max', 'lastname' => 'Mustermann', 'street' => 'Moostraße 66', 'zip' => 6666, 'city' => 'Mordsberg'));
    }

}

$search = new Search();
$search->normForm();