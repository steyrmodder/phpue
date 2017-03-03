<?php
session_start();

/**
 * Einbinden der define-Angaben für IMAR
 */
require_once("includes/defines.inc.php");

/**
 * Einbinden des Session-Handlings und der Umleitung auf HTTPS (Port 443)
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
/**
 * Einbinden der Imageverarbeitungs-Klasse Image
 */
require_once IMAGE_CLASS;

/**
 * Class IMAR implementiert die Startseite (index.php) des IMageARchives
 *
 * Die Seite index.php setzt auf der ojectorientieren Klasse TNormform und den Smarty-Templates auf.
 * Die Klasse FileAccess wird für das Schreiben von Benutzerdaten und Bildmetadaten ins Filesystem verwendet.
 *
 * Diese Seite listet die Bilder des IMageARchives in einer dreispaltigen Liste auf, bei weniger als 3 Bildern in einer Reihe wird die Breite angepasst.
 * Über die Eingabefelder Image Author, Image Title und Image File können weitere Bilder hochgeladen und beschrieben werden.
 * Optional kann eine Watermark implementiert werden.
 *
 * Die Klasse ist final, da es keinen Sinn macht, davon noch weitere Klassen abzuleiten.
 *
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @author Wolfgang Hochleitner <wolfgang.hochleitner@fh-hagenberg.at>
 * @package hm2
 * @version 2017
 */
final class IMAR extends AbstractNormForm
{
    /**
     * Konstanten für ein HTML Attribute z.B:: <input name='pname' id='pname' ... >, <label for='pname' ... >, Keys für $_POST[self::PNAME]..
     *
     * @var string IMAGE Key für $_GET- und $_SESSION-Eintrag den Starteintrag für den angezeigten Ausschnitt der Produktliste festlegt @see includes/basetemplates/pagination.tpl
     * @var string MAX_FILE_SIZE Key für den hidden $_POST-Eintrag für die Maximale Uploadgröße
     * @var string MAX_FILE_SIZE_VALUE Wert für die Maximale Filegröße des Upload-Files
     * @var string IMAGEAUTHOR Key für $_POST-Eintrag Image Author
     * @var string IMAGETITLE Key für $_POST-Eintrag Image Title
     * @var string WATERMARK Key für $_POST-Eintrag für die Checkbox Watermark
     * @var string IMAGEDATAPATH Pfad für die Datei, in der die Metadaten für die hochgeladenen Bilder gespeichert werden
     * @var string THUMB_SIZEDie (quadratische) Größe eines Vorschaubildes.
     * @var string FONT_DIR Das Verzeichnis, in dem die verwendeten Schriften liegen.
     * @var string FONT_FILENAME Die verwendete Schriftdatei.
     */
    const IMAGE_UPLOAD = "imageUpload";
    const MAX_FILE_SIZE_VALUE = "2097152";
    const IMAGE_AUTHOR = "imageAuthor";
    const IMAGE_TITLE = "imageTitle";

    /**
     * @var string $fileAccess Filehandler für den Filezugriff
     */
    private $fileAccess;

    /**
     * IMAR Constructor.
     *
     * Ruft den Constructor der Klasse TNormform auf.
     * Erzeugt den Filehandler für den Filesystemzugriff
     * Erzeugt den Imagehandler für die Imageverarbeitung
     */
    public function __construct(View $defaultView, $templateDir = "templates", $compileDir = "templates_c")
    {
        parent::__construct($defaultView, $templateDir, $compileDir);

        //--
        require '../../phpuesolution/index/construct.inc.php';
        //*/

        // Add the images to our view since we can't do this from outside the object
        $this->currentView->setParameter(new GenericParameter("images", $this->getImages()));
    }

    /**
     * Zeigt die Seite mittels Smarty Templates an
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    /*protected function display()
    {
        $this->smarty->display('indexMain.tpl');
    }*/

    /**
     * Validiert den Benutzerinput nach dem Hochladen eines neunen Bildes.
     *
     * $this->fileAccess->uploadOkay(self::IMAGE) prüft, ob der Upload funktioniert hat
     * $this->fileAccess->interpretError(self::IMAGE) gibt, wenn der Upload nicht funktioniert hat, die passende Fehlermeldung zurück
     * $this->image->isImage(self::IMAGE) prüft, ob es sich bei der hochgeladnen Datei, um ein Image handelt.
     * Sollen wir hier gleich auf die von GD-Lib unterstützen Formate prüfen?? Würde ich für sinnvoll halten.
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
        require '../../phpuesolution/index/isValid.inc.php';
        //*/

        $this->currentView->setParameter(new GenericParameter("errorMessages", $this->errorMessages));

        return (count($this->errorMessages) === 0);
    }

    protected function business()
    {
        if ($this->addImage()) {
            $this->statusMessage = "Your file has been uploaded successfully";
            $this->currentView->setParameter(new GenericParameter("statusMessage", $this->statusMessage));
            $this->currentView->setParameter(new GenericParameter("images", $this->getImages()));
            $this->currentView->setParameter(new PostParameter(IMAR::IMAGE_TITLE, true));
            $this->currentView->setParameter(new PostParameter(IMAR::IMAGE_AUTHOR, true));
        } else {
            $this->errorMessages ["addImage"] = "Error adding image. Please try again";
        }
    }

    /**
     * Überprüft, ob eine Checkbox mit einem bestimmten Namen angewählt ist, oder nicht.
     *
     * @param string $name Der Name der zu überprüfenden Checkbox.
     * @return bool Gibt <pre>true</pre> zurück, wenn die Checkbox angewählt war, sonst <pre>false</pre>.
     */
    private function isChecked($name)
    {
        return isset($_POST[$name]) && strcmp($_POST[$name], "on") === 0 ? true : false;
    }

    /**
     * Liest alle Datensätze aus der Datei data/imagedata.txt und gibt sie als Array zurück.
     *
     * Wenn das File nicht existiert wird nur das Eingabeformular angezeigt.
     * Format ist das JSON-Format. TRUE in json_decode($item, true) macht aus $imageitem ein Array statt eines Objektes.
     * Beispielsatz
     * {"imagepath":"images/tdot.jpg","thumbpath":"images/thumbs/nothumb.bmp","title":"Tdot","uploadedby":"John Doe","author":"FH Hagenberg","date":"03.11.2016","time":"12:49:17"}
     *
     * @return array gibt das als Array dekodierte $imageArray zurück.
     *               Wenn das
     *
     * Können wir auch mit dem Objekt weiterarbeiten in Smarty???!!!!!!! und das true bei json_decode weglassen?????
     */
    private function getImages()
    {
        $imageArray = [];
        //--
        require '../../phpuesolution/index/getImages.inc.php';
        //*/
        return $imageArray;
    }

    /**
     * Fügt ein Image zu IMAR hinzu
     *
     * Wenn das Verzeichnis, in dem die Images gespeichert werden nicht exisitert, wird es angelegt.
     *
     * $this->fileAccess->storeUploadedFile() speichert die eingegebenen Daten + automatisch generierte Daten im JSON-Format in data/imagedata.txt
     * uploadedby wird aus dem Session-Array befüllt, falls der User eingeloggt ist. Ansonsten mit einem Dummywert befüllt
     * date und time werden mit date() generiert.
     * Beispieldatensatz:
     * {"imagepath":"images/typewriter.jpg","thumbpath":"images/thumbs/nothumb.bmp","title":"TypeWriter","author":"Campus Hagenberg","uploadedby":"John Doe","date":"03.11.2016","time":"12:54:01"}
     * $this->image->addWatermark() fügt dem Bild eine Watermark hinzu mit "Titel © Author"
     * Copyright-Zeichen Windows: Alt + 0169 am Ziffernblock, MAC: Alt + G
     * $this->image->addThumbnail() speichert zusätzlich ein Thumbnail in images/thumbs
     *
     * @return bool Gibt im Fehlerfall false zurück, im Gutfall true.
     */
    private function addImage()
    {
        $imagePath = $this->generateUniqueImagePath();
        //--
        return require '../../phpuesolution/index/addImage.inc.php';
        //*/

        /*##
        return true;
        //*/
    }

    /**
     * Erzeugt einen eindeutigen Pfad- und Dateinamen für eine Datei.
     *
     * Für UE5 gibt sie mit Utilities::replaceUmlauts() einfach den um Umlaute bereinigten Namen zurück.
     * Wenn sie nicht implementiert wird ein vorgeneriertes File.
     *
     * @return string Der neue, zufällig generierte Pfad.
     */
    private function generateUniqueImagePath()
    {
        // Dieser Wert wird zurückgegeben, wenn man die Methode nicht implementiert.
        $imagePath = FileAccess::IMAGE_DIRECTORY . "your_random_filename_here.jpg";
        //--
        require '../../phpuesolution/index/generateUniqueImagePath.inc.php';
        //*/

        return $imagePath;
    }
}

/**
 * Instantiieren der Klasse IMAR und Aufruf der Methode TNormform::normForm()
 *
 * FileAccess-Exceptions werden erst hier abgefangen und eine formatierte DEBUG-Seite mit den Fehlermeldungen mit echo ausgegeben @see FileAcess::debugFileError()
 * Bei PHP-Exception wird vorerst nur auf eine allgemeine Errorpage weitergeleitet
 */
try {
    Redirect::redirectTo();

    $view = new View(View::FORM, "indexMain.tpl", [
        new GenericParameter("imageUpload", IMAR::IMAGE_UPLOAD),
        new GenericParameter("maxFileSizeValue", IMAR::MAX_FILE_SIZE_VALUE),
        new PostParameter(IMAR::IMAGE_TITLE),
        new PostParameter(IMAR::IMAGE_AUTHOR)
    ]);

    $imar = new IMAR($view);
    $imar->normForm();
} catch (FileAccessException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    header("Location: ../includes/errorpage.html");
}
