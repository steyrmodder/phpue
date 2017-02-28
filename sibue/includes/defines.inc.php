<?php
/**
 * In define.inc.php werden Konstanten festgelegt, die in der gesamten Webapplikation gültig sind (Superglobal, $GLOBALS)
 */

/*
 * Name der Website festlegen
 */
define("TITLE","SIBUE");
define("SUBTITLE","Imprint and Contact");

/**
 * Pfade, Directories und Dateien
 * 
 */
define("NORM_DIR","/vendor/normform/");
define("UTILITIES",NORM_DIR . "Utilities.class.php");
define("TNORMFORM",NORM_DIR . "TNormform.class.php");
define("CSS_DIR",NORM_DIR . "css");
define("TNTEMPLATE_DIR",NORM_DIR . "basetemplates/");
define("ICON","<i class=\"fa fa-picture-o\"></i>");

