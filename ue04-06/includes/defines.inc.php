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
define("ICON", "<i class=\"fa fa-picture-o\" aria-hidden=\"true\"></i>");


// Path and file definitions

/**
 * @var string NORM_DIR The Path to the NormForm library.
 */
define("NORM_DIR", "../vendor/normform/");

/**
 * @var string NORM_FORM Path to the abstract NormForm base class.
 */
define("NORM_FORM", NORM_DIR . "AbstractNormForm.php");

/**
 * @var string CSS_DIR Path to the CSS files provided by NormForm.
 */
define("CSS_DIR", NORM_DIR . "css");

/**
 * @var string UTILITIES Path to the Utilities class.
 */
define("UTILITIES", "../includes/Utilities.php");

/**
 * @var string HTTPS_REDIRECT Path to the HTTPS redirect include.
 */
define("HTTPS_REDIRECT", "../includes/https-redirect.inc.php");

/**
 * @var string LOGIN_SYSTEM Path to the LoginSystem class.
 */
define("LOGIN_SYSTEM", "includes/LoginSystem.php");

/**
 * @var string FILE_ACCESS Path to the FileAccess class.
 */
define("FILE_ACCESS", "includes/FileAccess.php");

/**
 * @var string IMAGE_PROCESSING Path to the ImageProcessing class.
 */
define("IMAGE_PROCESSING", "includes/ImageProcessing.php");


// Session fields

/**
 * @var string USERNAME Key for the session field that holds the currently logged in username.
 */
define("USERNAME", "username");

/**
 * @var string IS_LOGGED_IN Key for the session field which remembers that a user is currently logged in.
 */
define("IS_LOGGED_IN", "is_logged_in");


// Protected pages and header forwards

/**
 * @var array PROTECTED_PAGES Array with pages that are protected through the login mechanism.
 */
define("PROTECTED_PAGES", ["index.php"]);

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
