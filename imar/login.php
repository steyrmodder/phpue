<?php
/*
 * Das objektorientierte und templatebasierte Login-formular setzt das Einloggen in IMAR um.
 * *
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @author Wolfgang Hochleitner <wolfgang.hochleitner@fh-hagenberg.at>
 * @package hm2
 * @version 2016
 */
require_once 'includes/defines.inc.php';
require_once NORM_DIR . 'session.inc.php';
require_once UTILITIES;
require_once TNORMFORM;
require_once FILEACCESS;

final class Login extends TNormForm {
    /**
     *  Konstante für ein HTML Attribut <input name=EMAIL>
     */
    const EMAIL = "email";
    /**
     *  Konstante für ein HTML Attribut <input name=PASSWORD>
     */
    const PASSWORD = "password1";
    const FIRSTNAME = "first_name";
    const LASTNAME = "last_name";
    const IDUSER = "iduser";

    const USERDATAPATH = DATA_DIR . "userdata.txt";

    private $fileAccess;

    public function __construct() {
        parent::__construct();
        /*--
        require 'solution/login/construct.inc.php';
        //*/
    }

    protected function prepareFormFields() {
        $this->smarty->assign("emailKey", self::EMAIL);
        $this->smarty->assign("passwordKey", self::PASSWORD);
        /*--
        require 'solution/login/prepareFormFields.inc.php';
        //*/
		}

    protected function display() {
        $this->smarty->display('loginMain.tpl');
    }

    protected function isValid() {
        /*--
        require 'solution/login/isValid.inc.php';
        //*/
        //##
        $this->authenticateUser();
        //*/
        return (count($this->errMsg) === 0);
    }

    protected function process() {
        Utilities::redirectTo();
    }

    private function authenticateUser() {
         //##
        $_SESSION['iduser']=1;
        $_SESSION[ISLOGGEDIN] = sha1($_SERVER["REMOTE_ADDR"] . $_SERVER["HTTP_USER_AGENT"] . $_SESSION['iduser']);
        $_SESSION['first_name']='John';
        $_SESSION['last_name']='Doe';
        //*/
        /*--
        require 'solution/login/authenticateUser.inc.php';
        //*/
        if (isset($_SESSION[ISLOGGEDIN])) {
            return true;
        } else {
            return false;
        }
    }
}
/**
 * Umlenken auf index.php falls man bereits eingeloggt ist
 */
Utilities::redirectTo();
$login = new Login();
$login->normForm();