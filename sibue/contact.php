<?php
/**
 * Einbinden der define-Angaben für SIBUE
 */
require_once 'includes/defines.inc.php';
/**
 * Einbinden der Klasse TNormform, die die Formularabläufe festlegt. Bindet auch Utilities.php ein.
 */
require_once NORMFORM;

/*
 * Das objektorientierte und templatebasierte Registrier-formular setzt die Userregistrierung in IMAR um.
 * *
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @package hm2
 * @version 2017
 */
final class Contact extends AbstractNormForm {
    /**
     * Konstanten für ein HTML Attribute z.B:: <input name='pname' id='pname' ... >, <label for='pname' ... >, Keys für $_POST[self::PNAME]..
     *
     * @var string SUBJECT Key für $_POST-Array
     * @var string REQUEST Key für $_POST-Array
     * @var string EMAIL Key für $_POST-Array
     * @var string PRIORITY Key für $_POST-Array
     */
    const SUBJECT = "subject";
    const REQUEST = "request";
    const EMAIL = "email";
    const PRIORITY = "priority";

    /**
     * IMAR Constructor.
     *
     * Ruft den Constructor der Klasse TNormform auf.
     */
    public function __construct(View $defaultView, $templateDir = "templates", $compileDir = "templates_c") {
        parent::__construct($defaultView, $templateDir, $compileDir);
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
    protected function prepareFormFields() {
        $this->smarty->assign("subjectKey", self::SUBJECT);
        $this->smarty->assign("requestKey", self::REQUEST);
        $this->smarty->assign("emailKey", self::EMAIL);
        $this->smarty->assign("priorityKey", self::PRIORITY);
        /*--
        require '../imar/solution/contact/prepareFormFields.inc.php';
        //*/
    }

    /**
     * Zeigt die Seite mittels Smarty Templates an
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    protected function display() {
        $this->smarty->display('contactMain.tpl');
    }

    /**
     * Validiert den Benutzerinput nach dem Abschicken des Formulars.
     *
     * Zur Überprüfung, ob ein Formularfeld leer ist, eine Email und ein Passwort einer passenden REGEX entsprechen,
     * finden sich in @see /phpue/imar/normform/Utilities.php
     *
     * Ob eine Email in /phpue/imar/data/userdata.txt bereits vorhanden ist, wird mit $this->isUniqueEmail geprüft
     *
     * Fehlermeldungen werden im Array $errMsg[] gesammelt.
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     *
     * @return bool true, wenn $errMsg leer ist. Ansonsten false
     */
    protected function isValid(): bool {
        /*--
        require '../imar/solution/contact/isValid.inc.php';
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
    protected function business()
    {
        $this->statusMessage = "Your file has been uploaded successfully";
        $this->currentView->setParameter(new GenericParameter("statusMessage", $this->statusMessage));
        $this->currentView->setParameter(new PostParameter(Contact::SUBJECT, true));
        $this->currentView->setParameter(new PostParameter(Contact::REQUEST, true));
        $this->currentView->setParameter(new PostParameter(Contact::EMAIL, true));
        $this->currentView->setParameter(new PostParameter(Contact::PRIORITY, true));
    }    /**
     * Verarbeitet die Benutzereingaben, die mit POST geschickt wurden
     * Wenn alles gut geganden ist, wird eine Statusmeldung geschrieben, ansonsten eine Fehlermeldung.
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     *
     * @throws FileAccessException wird von allen $this->fileAccess Methoden geworfen und hier nicht behandelt.
     *         Die Exception wird daher nochmals weitergereicht (throw) und erst am Ende des Scripts behandelt.
     */
    protected function process() {
        $this->result = $_POST;
        $this->smarty->assign("result", $this->result);
        $this->statusMsg = "Verarbeitung erfolgreich!";
    }

}
/**
 * Instantiieren der Klasse Contact und Aufruf der Methode AbstractNormForm::normForm()
 *
 * Bei PHP-Exception wird vorerst nur auf eine allgemeine Errorpage weitergeleitet
 */
try {
    $view = new View(View::FORM, "contactMain.tpl", [
        new PostParameter(Contact::SUBJECT),
        new PostParameter(Contact::REQUEST),
        new PostParameter(Contact::EMAIL),
        new PostParameter(Contact::PRIORITY)
    ]);

    $contact = new Contact($view);
    $contact->normForm();
} catch (Exception $e) {
    //header("Location: https://localhost/phpue/includes/errorpage.html");
}