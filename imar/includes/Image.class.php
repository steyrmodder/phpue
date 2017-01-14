<?php
/**
 * Die objektorientierte Image-Klasse implementiert Basisfunktionen für die Imageverarbeitung.
 *
 * Umgesetzt sind alle für die IMAR Übungen notwendigen Basisfunktionen.
 *
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @package imar
 * @version 2016
 */
class Image {

    /**
     * Erzeugt ein neues Image-Objekt.
     */
    public function __construct() {
    }

    /**
     * Prüft, ob die hochgeladene Datei ein Image ist.
     *
     * @param $name Name des Upload-Feldes.
     * @return bool TRUE, wenn ein Image hochgeladen wurde, ansonsten FALSE.
     */
    public function isImage($name) {
        if (substr($_FILES[$name]['type'], 0, 6) === "image/" && exif_imagetype($_FILES[$name]["tmp_name"])) {
            return true;
        }
        return false;
    }

    /**
     * Erstellt einen neuen Thumbnail von einem hochgeladenen Bild. Wird das Bildformat von GD unterstützt, wird eine
     * kleine Version erstellt, ansonsten ein grüner Thumbnail mit einem Standardtext.
     *
     * @param string $imagePath Der Pfad zum Originalbild.
     * @return string Der Pfad zum Thumbnail.
     */
    public function addThumbnail($imagePath, $thumbPath, $fontdir, $fontfilename, $thumbsize) {
        /*--
        require 'C:\Users\p20137\Documents\GitHub\imar\solution\index\addThumbnail.inc.php';
        //*/
    }

    /**
     * Erzeugt ein Watermark in einem Bild, sofern das Dateiformat unterstützt ist.
     *
     * @param string $imagePath Der Pfad zum Originalbild.
     * @param string $author Der Autor, der im Watermark eingetragen werden soll.
     * @param string $title Titel des Bildes, der im Watermark eingetragen werden soll.
     */
    public function addWatermark ($author, $title, $imagePath, $fontdir, $fontfilename) {
        /*--
        require 'C:\Users\p20137\Documents\GitHub\imar\solution\index\addWatermark.inc.php';
        //*/
    }

    /**
     * Speichert ein Bild anhand seines EXIF-Typs im korrekten Format ab.
     *
     * @param resource $image Das Handle auf das zu speichernde Bild.
     * @param int $exifType Der EXIF-Typ des Bildes.
     * @param string $destinationPath Der Zielpfad an dem das Bild gespeichert werden soll.
     */
    public function saveImage($image, $exifType, $destinationPath) {
        /*--
        require 'C:\Users\p20137\Documents\GitHub\imar\solution\index\saveImage.inc.php';
        //*/
    }
}