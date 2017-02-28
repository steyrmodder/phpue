<?php
/**
 * Einbinden der define-Angaben für IMAR
 */
require_once("includes/defines.inc.php");
/**
 * Einbinden des Session-Handlings und der Umleitung auf HTTPS (Port 443)
 */
require_once("includes/session.inc.php");

require_once UTILITIES;

/**
 * Einbinden der Klasse TNormform, die die Formularabläufe festlegt. Bindet auch Utilities.class.php ein.
 */
require_once NORMFORM;
/**
 * Einbinden der Datei-Zugriffs-Klasse  FileAccess, die die Dateizugriffe implementiert
 */
require_once FILEACCESS;

/*
 * Das objektorientierte und templatebasierte Registrier-formular setzt die Userregistrierung in IMAR um.
 * *
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @author Wolfgang Hochleitner <wolfgang.hochleitner@fh-hagenberg.at>
 * @package hm2
 * @version 2017
 */

final class Register extends AbstractNormForm
{
    /**
     * Konstanten für ein HTML Attribute z.B:: <input name='pname' id='pname' ... >, <label for='pname' ... >, Keys für $_POST[self::PNAME]..
     *
     * @var string USERNAME Key für $_POST-Array und json-Array
     * @var string EMAIL Key für $_POST-Array und json-Array
     * @var string PASSWORD1 Key für $_POST-Array und json-Array
     * @var string PASSWORD2 Key für $_POST-Array und json-Array
     */
    const USERNAME = "username";
    const EMAIL = "email";
    const PASSWORD1 = "password1";
    const PASSWORD2 = "password2";

    /**
     * @var string IDUSER Konstante für Autoincrement-Wert der isuder,die im json-Array in @see /phpue/imar/data/userdata.txt gespeichert wird
     *
     */
    const IDUSER = "iduser";

    /**
     * @var string Pfad, in dem die Benutzerdaten bei der Registrierung gespeichert werden
     */
    const USERDATAPATH = DATA_DIR . "userdata.txt";

    /**
     * @var string $fileAccess Filehandler für den Filezugriff
     */
    private $fileAccess;

    /**
     * @var int $autoincrementID speichert, den Autoincrement-Wert, der in @see isUniqueEmail ermittelt wird
     */
    private $autoincrementID;

    /**
     * IMAR Constructor.
     *
     * Ruft den Constructor der Klasse TNormform auf.
     * Erzeugt den Filehandler für den Filesystemzugriff
     * initialisiert $this->autoincrementID mit dem Startwert 1
     */
    public function __construct(View $defaultView, $templateDir = "templates", $compileDir = "templates_c")
    {
        parent::__construct($defaultView, $templateDir, $compileDir);
        //--
        require '../../phpuesolution/register/construct.inc.php';
        //*/
    }

    /**
     * Weist die Inhalte der Smarty-Variablen zu. @see templates/registerMain.tpl
     *
     * Keys für $_POST-Array werden zugewiesen.
     * Die Werte, die der Benutzer eingibt werden im Fehlerfall zurückgegeben
     * Passwörter werden nicht zurückgegeben.
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    /*protected function prepareFormFields()
    {
        $this->smarty->assign("usernameKey", self::USERNAME);
        $this->smarty->assign("emailKey", self::EMAIL);
        $this->smarty->assign("passwordKey1", self::PASSWORD1);
        $this->smarty->assign("passwordKey2", self::PASSWORD2);
        //--
        require '../../phpuesolution/register/prepareFormFields.inc.php';
        //*/
    //}

    /**
     * Zeigt die Seite mittels Smarty Templates an
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    /*protected function display()
    {
        $this->smarty->display('registerMain.tpl');
    }*/

    /**
     * Validiert den Benutzerinput nach dem Abschicken des Formulars.
     *
     * Zur Überprüfung, ob ein Formularfeld leer ist, eine Email und ein Passwort einer passenden REGEX entsprechen,
     * finden sich in @see /phpue/ue04-07/normform/Utilities.class.php
     *
     * Ob eine Email in /phpue/ue04-07/data/userdata.txt bereits vorhanden ist, wird mit $this->isUniqueEmail geprüft
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
        require '../../phpuesolution/register/isValid.inc.php';
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
        if ($this->addUser()) {
            Utilities::redirectTo(LOGIN);
        } else {
            $this->errorMessages['database'] = 'User could not be added. Please contact Support Team!';
        }
    }*/

    protected function business()
    {
        if ($this->addUser()) {
            Utilities::redirectTo(LOGIN);
        } else {
            $this->errorMessages['database'] = 'User could not be added. Please contact Support Team!';
        }
    }

    /**
     * Prüft, ob eine in $_POST übergebene Email bereits im File /phpue/imar/data/userdata.txt vorhanden ist.
     * Beim Durchlaufen des eingelesenen Arrays wird auch gleich der Autoincrement-Wert bestimmt, @see FileAcess.class.php .
     * Dieser wird in die Objektvariable $this->autoincrementID geschrieben.
     * Dazu wird das Array nach der userid sortiert und dann der höchste Wert, um 1 erhöht.
     *
     * @return bool true, wenn die Email nicht im File vorkommt, ansonsten false.
     */
    private function isUniqueEmail()
    {
        //--
        require '../../phpuesolution/register/isUniqueEmail.inc.php';
        //*/
        return (count($this->errorMessages) === 0);
    }

    /**
     * Fügt die übergebenen Daten als neuen Datensatz im JSON-Format in der Datenbank ein.
     * @see includes/FileAccess.class.php
     *
     * @return bool true, wenn beim Schreiben keine Fehler auftreten, ansonsten false
     */
    private function addUser()
    {
        if (!$password = Utilities::encryptPWD($_POST[self::PASSWORD1])) {
            $this->errorMessages["password"] = "No Password could be generated";
        }
        //--
        require '../../phpuesolution/register/addUser.inc.php';
        //*/
        return (count($this->errorMessages) === 0);
    }
}

/**
 * Instantiieren der Klasse Register und Aufruf der Methode TNormform::normForm()
 *
 * FileAccess-Exceptions werden erst hier abgefangen und eine formatierte DEBUG-Seite mit den Fehlermeldungen mit echo ausgegeben @see FileAcess::debugFileError()
 * Bei PHP-Exception wird vorerst nur auf eine allgemeine Errorpage weitergeleitet
 */
try {
    $view = new View(View::FORM, "registerMain.tpl", [
        new PostParameter(Register::USERNAME),
        new PostParameter(Register::EMAIL),
        new GenericParameter("passwordKey1", Register::PASSWORD1),
        new GenericParameter("passwordKey2", Register::PASSWORD2)
    ]);

    $register = new Register($view);
    $register->normForm();
} catch (FileAccessException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    header("Location: https://localhost/onlineshop/errorpage.html");
}

