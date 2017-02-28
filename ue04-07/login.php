<?php

session_start();

/**
 * Einbinden der define-Angaben für IMAR
 */
require_once("includes/defines.inc.php");
/**
 * Einbinden des Session-Handlings und der Umleitung auf HTTPS (Port 443)
 */
require_once("../includes/https-redirect.inc.php");

require_once UTILITIES;

/**
 * Einbinden der Klasse TNormform, die die Formularabläufe festlegt. Bindet auch Utilities.php ein.
 */
require_once NORMFORM;
/**
 * Einbinden der Datei-Zugriffs-Klasse  FileAccess, die die Dateizugriffe implementiert
 */
require_once FILEACCESS;

/*
 * Das objektorientierte und templatebasierte Login-formular setzt das Einloggen in IMAR um.
 * *
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @author Wolfgang Hochleitner <wolfgang.hochleitner@fh-hagenberg.at>
 * @package hm2
 * @version 2017
 */

final class Login extends AbstractNormForm
{
    /**
     * Konstanten für ein HTML Attribute z.B:: <input name='pname' id='pname' ... >, <label for='pname' ... >, Keys für $_POST[self::PNAME]..
     *
     * @var string EMAIL Key für $_POST-Array
     * @var string PASSWORD Key für $_POST-Array
     */
    const EMAIL = "email";
    const PASSWORD = "password1";

    /**
     * Konstanten für das $_SESSION-Array, um Werte, die aus @see /phpue/imar/data/userdata.txt gelesen werden, zu speichern
     *
     * @var string IDUSER
     * @var string USERNAME
     * @var string LASTNAME
     */
    const IDUSER = "iduser";
    const FIRSTNAME = "first_name";
    const LASTNAME = "last_name";

    /**
     * @var string Pfad, aus dem die Benutzerdaten bei der Authentifizierung gelesen werden
     */
    const USERDATAPATH = DATA_DIR . "userdata.txt";

    /**
     * @var string $fileAccess Filehandler für den Filezugriff
     */
    private $fileAccess;

    /**
     * IMAR Constructor.
     *
     * Ruft den Constructor der Klasse TNormform auf.
     * Erzeugt den Filehandler für den Filesystemzugriff
     */
    public function __construct(View $defaultView, $templateDir = "templates", $compileDir = "templates_c")
    {
        parent::__construct($defaultView, $templateDir, $compileDir);
        //--
        require '../../phpuesolution/login/construct.inc.php';
        //*/
    }

    /**
     * Weist die Inhalte der Smarty-Variablen zu. @see templates/loginMain.tpl
     *
     * Die Keys für das $_POST-Array werden gesetzt.
     * Nur die eingegebene emailValue wird dem Benutzer im Fehlerfall wieder angezeigt.
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    /*protected function prepareFormFields()
    {
        $this->smarty->assign("emailKey", self::EMAIL);
        $this->smarty->assign("passwordKey", self::PASSWORD);
        //--
        require '../../phpuesolution/login/prepareFormFields.inc.php';
        //*/
    //}

    /**
     * Zeigt die Seite mittels Smarty Templates an
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    /*protected function display()
    {
        $this->smarty->display('loginMain.tpl');
    }*/

    /**
     * Validiert den Benutzerinput nach dem Abschicken des Formulars.
     *
     * Fehlermeldungen werden im Array $errMsg[] gesammelt.
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     *
     * @return bool true, wenn $errMsg leer ist. Ansonsten false
     */
    protected function isValid(): bool
    {
        //--
        require '../../phpuesolution/login/isValid.inc.php';
        //*/
        /*##
        $this->authenticateUser();
        //*/
        return (count($this->errorMessages) === 0);
    }

    /**
     * Verarbeitet die Benutzereingaben, die mit POST geschickt wurden
     * Wenn alles gut geganden ist, wird eine Statusmeldung geschrieben, ansonsten eine Fehlermeldung.
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     *
     * @throws FileAccessException wird von allen $this->fileAccess Methoden geworfen und hier nicht behandelt.
     *         Die Exception wird daher nochmals weitergereicht (throw) und erst am Ende des Scripts behandelt.
     */
    /*protected function process()
    {
        Utilities::redirectTo();
    }*/

    protected function business()
    {
        Utilities::redirectTo();
    }

    private function authenticateUser()
    {
        /*##
        $_SESSION['iduser'] = 1;
        $_SESSION[IS_LOGGED_IN] = sha1($_SERVER["REMOTE_ADDR"] . $_SERVER["HTTP_USER_AGENT"] . $_SESSION['iduser']);
        $_SESSION['first_name'] = 'John';
        $_SESSION['last_name'] = 'Doe';
        //*/
        //--
        require '../../phpuesolution/login/authenticateUser.inc.php';
        //*/
        if (isset($_SESSION[IS_LOGGED_IN])) {
            return true;
        } else {
            return false;
        }
    }
}

/**
 * Instantiieren der Klasse Login und Aufruf der Methode TNormform::normForm()
 *
 * FileAccess-Exceptions werden erst hier abgefangen und eine formatierte DEBUG-Seite mit den Fehlermeldungen mit echo ausgegeben @see FileAcess::debugFileError()
 * Bei PHP-Exception wird vorerst nur auf eine allgemeine Errorpage weitergeleitet
 *
 * Umlenken auf index.php falls man bereits eingeloggt ist
 */
try {
    $view = new View(View::FORM, "loginMain.tpl", [
        new PostParameter(Login::EMAIL),
        new GenericParameter("passwordKey", Login::PASSWORD)
    ]);

    $login = new Login($view);
    $login->normForm();
} catch (FileAccessException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    header("Location: https://localhost/imar/errorpage.html");
}
