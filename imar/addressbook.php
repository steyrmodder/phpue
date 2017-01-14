<?php
require_once 'includes/defines.inc.php';
require_once NORM_DIR . 'session.inc.php';
require_once UTILITIES;
require_once TNORMFORM;
require_once FILEACCESS;

final class AddressBook extends TNormForm {

    const FIRSTNAME = 'firstname';
    const LASTNAME = 'lastname';
    const STREET = 'street';
    const ZIP = 'zip';
    const CITY = 'city';

    private $addresses;

    public function __construct() {
        parent::__construct();
    }

    protected function prepareFormFields() {
        $this->smarty->assign("firstnameKey", self::FIRSTNAME);
        $this->smarty->assign("lastnameKey", self::LASTNAME);
        $this->smarty->assign("streetKey", self::STREET);
        $this->smarty->assign("zipKey", self::ZIP);
        $this->smarty->assign("cityKey", self::CITY);
        /*--
        require 'solution/addressbook/prepareFormFields.inc.php';
        //*/
        $this->smarty->assign("addresses", $this->getAddresses());
    }

    protected function display() {
        $this->smarty->display('addressMain.tpl');
    }

    protected function isValid() {
        /*--
        require 'solution/addressbook/isValid.inc.php';
        //*/
        return (count($this->errMsg) === 0);
    }

    protected function process() {
        $this->getAddresses();
        $this->addAddress();
        $this->writeAddresses();
        $this->statusMsg = "Address added";
    }

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

    private function addAddress() {
        /*--
        require 'solution/addressbook/addAddress.inc.php';
        //*/
    }

    private function writeAddresses() {
        /*--
        require 'solution/addressbook/writeAddress.inc.php';
        //*/
    }
}
$addressBook = new AddressBook();
$addressBook->normForm();