<?php
/*
 * Einbinden der Klasse für die Filezugriff-Exception
 */
require_once 'FileAccessException.class.php';

/**
 * Die objektorientierte FileAccess-Klasse implentiert Basisfunktionen für das Lesen und Schreiben von Files.
 *
 * Umgesetzt sind alle für die IMAR-Übungen notwendigen Basisfunktionen des Filezugriffs
 *
 * Teile sind doppelt implementiert. Einmal mit und einmal ohne Exceptions.
 *
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @package imar
 * @version 2016
 */
class FileAccess
{
    const DATA_DIRECTORY = "data/";

    const IMAGE_DATA_PATH = self::DATA_DIRECTORY . "imagedata.json";

    const USER_DATA_PATH = self::DATA_DIRECTORY . "userdata.json";

    /**
     * @var string IMAGE_DIR Path where uploaded images are stored.
     */
    const IMAGE_DIRECTORY = "images/";

    /**
     * @var string THUMB_DIR Path where generated thumbnails are stored.
     */
    const THUMBNAIL_DIRECTORY = self::IMAGE_DIRECTORY . "thumbs/";

    /**
     * Erzeugt ein neues FileAcess-Objekt.
     */
    public function __construct()
    {
    }

    /**
     * Lädt den Inhalt eines Files in ein Array. Jede Zeile im File ist ein Eintrag im Array.
     *
     * @param $filename Das auszulesende File
     * @return array|bool Gibt im Gutfall das Array mit dem Fileinhalt zurück, im Fehlerfall FALSE.
     */
    public function loadContents($filename)
    {
        if (file_exists($filename)) {
            return json_decode(file_get_contents($filename), true) ?? [];
        }
        return [];
    }

    /**
     * Schreibt eine Datenzeile ans Ende eines Files.
     *
     * fopen öffnet ein File ("a" steht für append).
     * flock setzt eine exclusive Sperre (LOCK_EX) oder hebt sie auf (LOCK_UN).
     * fclose schließt das File.
     *
     * @param $filename File, an dessen Ende eine Zeile angehängt wird
     * @param $line Zeile, die ans Ende des Files geschrieben wird
     * @return bool TRUE, wenn das Schreiben erfolgreich ist. Sonst FALSE
     */
    public function storeContents($filename, $data)
    {
        $bytes = file_put_contents($filename, json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));

        if ($bytes > 0) {
            return true;
        }
        return false;
    }

    /**
     * Erzeugt eine AutoincrementID für das übergebende File. Voraussetzung ist, dass das Speicherformat JSON ist.
     * Beispielsatz:
     * {"iduser":1,"last_name":"user1","email":"testuser1@imar.com","password1":"$2y$10$HnuoGwu0u.heReSaV8D\/DOHpAAvZSi40p0DJA1lK6ViToam4M7gwy"}
     *
     * @param $filename File, für das eine AutoincrementID erzeugt werden soll.
     * @param $idname ID-Name, im Beispielsatz: iduser.
     * @return int die AutoincrementID, die ermittelt wurde.
     */
    public function autoincrementID($filename, $idname)
    {
        $itemArray = [];
        if (file_exists($filename)) {
            foreach ($this->loadContentsWithException($filename) as $row) {
                $item = json_decode($row, true);
                $itemArray[] = $item;
            }
            sort($itemArray);
            $maxID = end($itemArray);
            return $maxID = $maxID[$idname] + 1;
        } else {
            return 0;
        }
    }

    /**
     * Gibt an, ob ein Upload erfolreich war.
     *
     * @param string $name Der Name des Feldes im $_FILES-Array.
     * @return bool Gibt <pre>true</pre> zurück, wenn der Upload okay war, ansonsten <pre>false</pre>.
     */
    public function uploadOkay($name)
    {
        return ($_FILES[$name]["error"] === 0);
    }

    /**
     * Verschiebt ein hochgeladenes Files vom temporären Upload-Ornder in einen angegebenen Ordner.
     *
     * @param $file Name des Upload-Feldes
     * @param $filePath Pfad an den das hochgeladene File verschoben werden soll
     * @return bool Gibt im Gutfall TRUE zurück, ansonsten FALSE.
     */
    public function storeUploadedFile($file, $filePath)
    {
        if (is_uploaded_file($_FILES[$file]["tmp_name"])) {
            return move_uploaded_file($_FILES[$file]["tmp_name"], "$filePath");
        } else {
            return false;
        }
    }

    /**
     * Gibt einen passenden Fehlercode zurück, wenn beim Upload ein Fehler auftritt
     *
     * @param $name Name des Upload-Feldes
     * @return string
     */
    public function interpretError($name)
    {
        $errorCode = $_FILES[$name]["error"];
        $errorMessage = "";

        switch ($errorCode) {
            case UPLOAD_ERR_INI_SIZE: // 1
            case UPLOAD_ERR_FORM_SIZE: // 2
                $errorMessage = "The size of the file was too big. Please upload a smaller file.";
                break;
            case UPLOAD_ERR_PARTIAL: // 3
                $errorMessage = "The file was not fully uploaded. Please try again.";
                break;
            case UPLOAD_ERR_NO_FILE: // 4
                $errorMessage = "Please specify a file to upload.";
                break;
            case UPLOAD_ERR_NO_TMP_DIR: // 6
                $errorMessage = "Your web server is missing a temporary folder to upload. Please contact your administrator.";
                break;
            case UPLOAD_ERR_CANT_WRITE: // 7
                $errorMessage = "Your web server does not have permissions to write to disk. Please contact your administrator.";
                break;
            case UPLOAD_ERR_EXTENSION: // 8
                $errorMessage = "A PHP extension stopped the upload. Please contact your administrator.";
                break;
        }
        return $errorMessage;
    }

    /**
     * Start für Methoden, die Exceptions nutzen
     */

    /**
     * Diese Klasse lädt den Inhalt eines Files in ein Array und gibt dieses zurück.
     *
     * @param string $filename File, in das geschrieben werden soll
     * @return array enthält den Inhalt des ausgelesenen Files. Jede Zeile im Array entspricht einer Zeile im File
     *
     * @throws FileAccessException Wenn das File nicht existiert wird eine Exception geworfen
     */
    public function loadContentsWithException($filename)
    {
        if (file_exists($filename)) {
            return json_decode(file_get_contents($filename), true) ?? [];
        }
        $message = "File $filename is missing";
        $formatedError = $this->debugFileError($message);
        throw new FileAccessException($formatedError);
    }

    /**
     * Schreibt eine Datenzeile ans Ende eines Files.
     *
     * fopen öffnet ein File ("a" steht für append).
     * flock setzt eine exclusive Sperre (LOCK_EX) oder hebt sie auf (LOCK_UN).
     * fclose schließt das File.
     *
     * @param $filename File, an dessen Ende eine Zeile angehängt wird
     * @param $line Zeile, die ans Ende des Files geschrieben wird
     * @return bool TRUE, wenn das Schreiben erfolgreich ist. Sonst FALSE
     *
     * @throws FileAccessException, wenn beim Schreiben ein Fehler auftritt
     */
    public function storeContentsWithExceptions($filename, $line)
    {
        $bytes = file_put_contents($filename, json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));

        if ($bytes > 0) {
            return;
        }
        $message = "File $filename is missing";
        $formatedError = $this->debugFileError($message);
        throw new FileAccessException($formatedError);
    }

    /**
     * Für die FileAccess-Fehlerausgabe in einer statischen DEBUG Error Page formatieren wir die Fehler Meldung etwas schöner,
     * vergeben Namen für die Werte und ergänzen sie um den PHP Call Stack
     *
     * Leitet auf errorpage.html weiter bei DEBUG = FALSE @see includes/defines.inc.php
     *
     * @return string $formatedError Gibt bei DEBUG = TRUE eine formatierte Errorpage mit dem fehlerhaften SQL-Statement, der SQL-Fehlermeldung und dem PHP Call Stack zurück.
     */
    public function debugFileError($message)
    {
        // PHP Call Stack vom Ausgabepuffer in eine Zwischenvariable schreiben und leeren, sodass nichts mehr direkt in den Browser ausgegeben wird
        ob_start();
        debug_print_backtrace();
        $out2 = ob_get_contents();
        // Das Ganze noch etwas lesbarer formatieren
        $phpcallstack = str_replace('#', '<br>#', $out2);
        ob_clean();
        // Statische DEBUG Error Page erstellen, die statt des Smarty Templates ausgegeben wird
        $formatedError = <<<ERRORPAGE
        <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>DEBUG Error Page</title>
                </head>
                <body>
                    <div>
                        <h2> DEBUG Error Page for $_SERVER[SCRIPT_NAME] </h2>
                            <p><b> To hide error messages and redirect to errorpage.html set DEBUG = FALSE in normform/define.inc.php </b></p>
                            <b style='color: #FF0000;'> Please correct the following File Error </b><br>
                            <br>$message
                            <br><br><b>PHP Call Stack:</b><br>
                            $phpcallstack
                            <br><br><b>For more Information see:</b> 
                            <a href='http://www.php.net/manual/en/' target='_blank'>PHP Documentation</a>
                    </div>
                </body>
            </html>
ERRORPAGE;

        if (DEBUG) {
            // Fehlerbeschreibung an catch-Block weiterreichen.
            // Wird mit throw im catch-Block nochmals als DatabaseException weitergereicht und dann mit echo ausgegeben
            return $formatedError;
        } else {
            // In error_log schreiben, um Fehler nicht im Browser anzuzeigen
            // Wenn keine Zieldatei und in php.ini bei error_log nichts angegeben wird,
            // schreibt error_log() bei XAMPP unter Windows nach <xamppdir>/apache/logs/error.log
            error_log($formatedError, 0);
            // Umlenken auf eine neutrale Errorseite, die den Benutzer über das Problem informiert
            // Diesen Zweig kann man testen, indem man die Datenbank nicht startet und DEBUG=false setzt @see includes/defines.inc.php
            header("Location: https://localhost/onlineshop/errorpage.html");
            exit;
        }
    }

}