<?php
/**
 * logout.php zerstört die Session
 *
 * In diesem File muss für die UE nichts geändert werden
 */
session_start();
require_once 'includes/defines.inc.php';
require_once UTILITIES;
$_SESSION = array();
if (isset($_COOKIE[session_name()])) {
setcookie(session_name(), "", time() - 86400, "/");
}
session_destroy();
Utilities::redirectTo();