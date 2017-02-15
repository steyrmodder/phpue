<?php
/**
 * Einbinden der define-Angaben für IMAR
 */
require_once 'includes/defines.inc.php';
/**
 * Einbinden der Klasse TNormform, die die Formularabläufe festlegt. Bindet auch Utilities.class.php ein.
 */
require_once TNORMFORM;

/*
 * Das objektorientierte und templatebasierte Login-formular setzt das Einloggen in IMAR um.
 * *
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @package hm2
 * @version 2017
 */
final class Imprint extends TNormForm {
    /**
     * IMAR Constructor.
     *
     * Ruft den Constructor der Klasse TNormform auf.
     * Erzeugt den Filehandler für den Filesystemzugriff
     */
    public function __construct() {
        parent::__construct();
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
        $imprint = "<p>Hier sollte das Impressum stehen!</p>";
        //*/
        /*--
        require 'solution/imprint/prepareFormFields.inc.php';
        //*/
        $this->smarty->assign("imprint", $imprint);
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
        return (count($this->errMsg) === 0);
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
 * Instantiieren der Klasse Login und Aufruf der Methode TNormform::normForm()
 */
    $imprint = new Imprint();
    $imprint->normForm();
