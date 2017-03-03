<?php
session_start();

/**
 * Einbinden der define-Angaben für IMAR
 */
require_once("includes/defines.inc.php");
/**
 * Einbinden der Umleitung auf HTTPS (Port 443)
 */
require_once REDIRECT;

/**
 * Einbinden einer statischen Hilfsklasse mit Methoden zur Email-Überprüfung, Passwort-Überprüfung, ...
 */
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
    const USERNAME = "username";
    const PASSWORD = "password";

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

    protected function isValid(): bool
    {
        //--
        require '../../phpuesolution/login/isValid.inc.php';
        //*/
        /*##
        $this->authenticateUser();
        //*/

        $this->currentView->setParameter(new GenericParameter("errorMessages", $this->errorMessages));

        return (count($this->errorMessages) === 0);
    }

    protected function business()
    {
        //--
        require '../../phpuesolution/login/business.inc.php';
        //*/

        Redirect::redirectTo();
    }

    private function authenticateUser()
    {
        //--
        return require '../../phpuesolution/login/authenticateUser.inc.php';
        //*/

        /*##
        return true;
        //*/
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
    Redirect::redirectTo("bla.php");

    $view = new View(View::FORM, "loginMain.tpl", [
        new PostParameter(Login::USERNAME),
        new GenericParameter("passwordKey", Login::PASSWORD)
    ]);

    $login = new Login($view);
    $login->normForm();
} catch (FileAccessException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    header("Location: ../includes/errorpage.html");
}
