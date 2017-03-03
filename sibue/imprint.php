<?php
/**
 * Einbinden der define-Angaben für IMAR
 */
require_once 'includes/defines.inc.php';
/**
 * Einbinden der Klasse TNormform, die die Formularabläufe festlegt. Bindet auch Utilities.php ein.
 */
require_once NORMFORM;

/*
 * Das objektorientierte und templatebasierte Impressum setzt eine Seite ohne Formularfelder um.
 * *
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @package phpue
 * @version 2017
 */
final class Imprint extends AbstractNormForm {
    /**
     * Imprint Constructor.
     *
     * Ruft den Constructor der Klasse AbstractNormform auf.
     */
    public function __construct(View $defaultView, $templateDir = "templates", $compileDir = "templates_c") {
        parent::__construct($defaultView, $templateDir, $compileDir);
    }

    /**
     * Weist die Inhalte der Smarty-Variablen zu. @see templates/loginMain.tpl
     *
     * Die Keys für das $_POST-Array werden gesetzt.
     * Nur die eingegebene emailValue wird dem Benutzer im Fehlerfall wieder angezeigt.
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    protected function prepareFormFields() {
        //##
        $this->imprint = "<p>Hier sollte das Impressum stehen!</p>";
        //*/
        /*--
        require 'solution/imprint/prepareFormFields.inc.php';
        //*/
        $this->smarty->assign("imprint", $this->imprint);
		}

    /**
     * Zeigt die Seite mittels Smarty Templates an
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    protected function display() {
        $this->smarty->display('imprintMain.tpl');
    }

    /**
     * Validiert den Benutzerinput nach dem Abschicken des Formulars.
     * Da es hier kein Eingabeformular gibt, passiert hier nichts.
     *
     * Fehlermeldungen werden im Array $errMsg[] gesammelt.
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     *
     * @return bool true, wenn $errMsg leer ist. Ansonsten false
     */
    protected function isValid(): bool {
        return (count($this->errorMessages) === 0);
    }

    /**
     * Verarbeitet die Benutzereingaben, die mit POST geschickt wurden
     * Wenn alles gut geganden ist, wird eine Statusmeldung geschrieben, ansonsten eine Fehlermeldung.
     *
     * Abstracte Methode in der Klasse AbstractNormForm und muss daher hier implementiert werden
     *
     * @throws FileAccessException wird von allen $this->fileAccess Methoden geworfen und hier nicht behandelt.
     *         Die Exception wird daher nochmals weitergereicht (throw) und erst am Ende des Scripts behandelt.
     */
    protected function business()
    {
        $this->currentView->setParameter(new GenericParameter("imprint", $this->imprint));
    }

    /**
     * Hier werden normalerweise Benutzereingaben verarbeitet. Weil es eine statische Seite ohne Eingabeformular ist, passiert hier nichts
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    protected function process() {
        return true;
    }

}
/**
 * Instantiieren der Klasse Contact und Aufruf der Methode AbstractNormForm::normForm()
 *
 * Bei PHP-Exception wird vorerst nur auf eine allgemeine Errorpage weitergeleitet
 */
try {
    $view = new View(View::TEMPLATE, "imprintMain.tpl", []);

    $imprint = new Imprint($view);
    $imprint->normForm();
} catch (Exception $e) {
    //header("Location: https://localhost/phpue/includes/errorpage.html");
}