<?php
/**
 * logout.php zerstört die Session
 *
 * In diesem File muss für die UE nichts geändert werden
 */
session_start();
require_once 'includes/defines.inc.php';
require_once("../includes/https-redirect.inc.php");
require_once REDIRECT;

$_SESSION = [];
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), "", time() - 86400, "/");
}
session_destroy();

Redirect::redirectTo(LOGIN);
