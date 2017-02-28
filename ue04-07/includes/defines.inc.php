<?php

/**
 * This file holds all global constants that are used throughout the IMAR application.
 *
 * All global constants that are needed on the various pages are stored here.
 *
 * @author Wolfgang Hochleitner <wolfgang.hochleitner@fh-hagenberg.at>
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @version 2017
 */

// Site data

/**
 * @var string TITLE The title of the site. Used in the templates.
 */
define("TITLE", "IMAR");

/**
 * @var string SUBTITLE The subtitle of the site. Used in the templates.
 */
define("SUBTITLE", "The HM2 Image Archive");

/**
 * @var string ICON The site's FontAwesome icon.
 */
define("ICON", "<i class=\"fa fa-picture-o\"></i>");


// Path and file definitions

/**
 * @var string NORM_DIR The Path to the NormForm library.
 */
define("NORM_DIR", "../vendor/normform/");

/**
 * @var string UTILITIES Path to the Utilities class.
 */
define("UTILITIES", "../includes/Utilities.php");

/**
 * @var string NORMFORM Path to the NormForm class.
 */
define("NORMFORM", NORM_DIR . "AbstractNormForm.php");

/**
 * @var string CSS_DIR Path to the CSS files provided by NormForm.
 */
define("CSS_DIR", NORM_DIR . "css");

/**
 * @var string FILEACCESS Path to the FileAccess class.
 */
define("FILEACCESS", "includes/FileAccess.class.php");

/**
 * @var string IMAGE_CLASS Path to the Image class.
 */
define("IMAGE_CLASS", "includes/Image.class.php");

/**
 * @var string IMAGE_DIR Path where uploaded images are stored.
 */
define("IMAGE_DIR", "images/");

/**
 * @var string THUMB_DIR Path where generated thumbnails are stored.
 */
define("THUMB_DIR", IMAGE_DIR . "thumbs/");

/**
 * @var string DATA_DIR Path where the image data is stored.
 */
define("DATA_DIR", "data/");

/**
 * @var string XML_ADDRESS_PATH Path where the addressbook XML-file is stored.
 */
define("XML_ADDRESS_PATH", "data/addresses.xml");


// Session fields

/**
 * @var string IS_LOGGED_IN Key for the session field which remembers that a user is currently logged in.
 */
define("IS_LOGGED_IN", "is_logged_in");

/**
 * @var array REDIRECT_PAGES Array with pages for IMAR and OnlineShop that are protected through the login mechanism.
 */
define("REDIRECT_PAGES", ["index.php"]); // phpue


// Header forwards

/**
 * @var string INDEX Forward to the index page.
 */
define("INDEX", "index.php");

/**
 * @var string LOGIN Forward to the login page.
 */
define("LOGIN", "login.php");

/**
 * @var string REGISTER Forward to the registration page.
 */
define("REGISTER", "register.php");

/**
 * @var string LOGOUT Forward to the logout page.
 */
define("LOGOUT", "logout.php");


// Password length requirements

/**
 * @var int PWD_MIN Minimum length for passwords.
 */
define("PWD_MIN", 5);

/**
 * @var int PWD_MAY Maximum length for passwords.
 */
define("PWD_MAX", 20);