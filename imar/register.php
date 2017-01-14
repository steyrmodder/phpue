<?php
require_once 'includes/defines.inc.php';
require_once NORM_DIR . 'session.inc.php';
require_once UTILITIES;
require_once TNORMFORM;
require_once FILEACCESS;

final class Register extends TNormForm {
    const FIRSTNAME = "first_name";
    const LASTNAME = "last_name";
    const IDUSER = "iduser";
    const EMAIL = "email";
    const PASSWORD1 = "password1";
    const PASSWORD2 = "password2";

    const USERDATAPATH = DATA_DIR . "userdata.txt";

    private $fileAccess;
    private $iduser;
    private $useradded;
    private $autoincrementID;

    public function __construct() {
        parent::__construct();
        /*--
        require 'solution/register/construct.inc.php';
        //*/
    }

    protected function prepareFormFields() {
        $this->smarty->assign("lastnameKey", self::LASTNAME);
        $this->smarty->assign("emailKey", self::EMAIL);
        $this->smarty->assign("passwordKey1", self::PASSWORD1);
        $this->smarty->assign("passwordKey2", self::PASSWORD2);
        /*--
        require 'solution/register/prepareFormFields.inc.php';
        //*/
    }

    protected function display() {
        $this->smarty->display('registerMain.tpl');
    }

    protected function isValid() {
        /*--
        require 'solution/register/isValid.inc.php';
        //*/
        return (count($this->errMsg) === 0);
    }

    protected function process() {
        if ($this->addUser()) {
            Utilities::redirectTo(LOGIN);
        } else {
            $this->errMsg['database'] = 'User could not be added. Please contact Support Team!';
        }
    }

    
    private function isUniqueEmail() {
        /*--
        require 'solution/register/isUniqueEmail.inc.php';
        //*/
        return (count($this->errMsg) === 0);
    }

    private function addUser() {
        if (!$password = Utilities::encryptPWD($_POST[self::PASSWORD1])) {
            $this->errMsg = "No Password could be generated";
        }
        /*--
        require 'solution/register/addUser.inc.php';
        //*/
        return (count($this->errMsg) === 0);
    }
}
try {
    $register = new Register();
    $register->normForm();
} catch (FileAccessException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    header("Location: https://localhost/onlineshop/errorpage.html");
}

