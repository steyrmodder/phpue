<?php
/**
 * In define.inc.php werden Konstanten festgelegt, die in der gesamten Webapplikation gültig sind (Superglobal, $GLOBALS)
 */

/*
 * Name der Website festlegen
 */
define("TITLE","IMAR");
define("SUBTITLE","The HM2 Image Archive");

/**
 * Pfade, Directories und Dateien
 * 
 */
define("NORM_DIR","normform/");
define("UTILITIES",NORM_DIR . "Utilities.class.php");
define("TNORMFORM",NORM_DIR . "TNormform.class.php");
define("CSS_DIR",NORM_DIR . "css");
define("TNTEMPLATE_DIR",NORM_DIR . "basetemplates/");
define("FILEACCESS","includes/FileAccess.class.php");
define("IMAGECLASS","includes/Image.class.php");
define("ICON","<i class=\"fa fa-picture-o\"></i>");
define("IMAGE_DIR","images/");
define("THUMB_DIR",IMAGE_DIR ."thumbs/");
define("DATA_DIR","data/");
define("XMLADDRESSPATH","data/addresses.xml");

/*
 * session fields
 *
 * @var string ISLOGGEDIN Key für den Wert, der in der Session gespeichert wird um festzuhalten, dass sich ein User bereits eingeloggt hat.
 * @var array REDIRECT_PAGES Array mit Seiten, die durch ein Login geschützt sind bei IMAR bzw. OnlineShop
*/
define("ISLOGGEDIN", "isloggedin");
define("REDIRECT_PAGES",array("index.php")); // phpue

/*
 * header forwards
 * Für die Seitenweiterleitung werden die Aufrufe hier festgelegt, falls sich die Filestruktur der Webseite später ändert.
 *
 * @var string INDEX gibt die Umleitung auf die Index-Seite an
 * @var string LOGIN gibt die Umleitung auf die Login-Seite an
 * @var string REGISTER gibt die Umleitung auf die Register-Seite an
 */
define("INDEX", "index.php");
define("LOGIN", "login.php");
define("REGISTER","register.php");
/**
 * Konstanten, um die Passwortlänge zu bestimmen
 * @var int PWDMIN Minimale Passwortlänge bei Eingabe, kann für Testdurchläufe verkürzt werden, weil man das Passwort immer eingeben muss
 * @var int PWDMAX Maximale Passwortlänge bei Eingabe, kann verlängert werden bei Bedarf
 */
define("PWDMIN",5);
define("PWDMAX",20);
