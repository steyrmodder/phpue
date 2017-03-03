<?php

/**
 * Created by PhpStorm.
 * User: Wolfgang
 * Date: 03.03.2017
 * Time: 01:26
 */
class Redirect
{
    /**
     * Umleitung auf eine Seite, die im gleichen Verzeichnis gespeichert ist
     * Gesteuert wird die Funktion über das vordefinierte Array REDIRECT_PAGES in defines.inc.php von IMAR oder Onlineshop mit Seiten, die durch ein Login geschützt werden sollen
     * Es wird $_SERVER['SCRIPT_NAME'] verwendet, weil es im Gegensatz zu $_SERVER['PHP_SELF'] an die URL angehängte GET-Parameter nicht enthält (Forced Browsing verhindern)
     * Usage: Utilities::protectPage();
     *
     */
    public static function protectPage()
    {
        $currentPage = basename($_SERVER["SCRIPT_NAME"]);
        $redirect = null;

        switch ($currentPage) {
            case LOGIN:
            case REGISTER:
                if (isset($_SESSION[IS_LOGGED_IN]) && $_SESSION[IS_LOGGED_IN] === self::generateLoginHash()) {
                    $redirect = INDEX;
                }
                break;
            case in_array($currentPage, REDIRECT_PAGES):
                if (!isset($_SESSION[IS_LOGGED_IN]) || $_SESSION[IS_LOGGED_IN] !== self::generateLoginHash()) {
                    $redirect = LOGIN;
                }
                break;
            default:
                $redirect = null;
        }
        if ($redirect) {
            self::redirectTo($redirect);
        }
    }

    public static function redirectTo(string $location)
    {
        header("Location: $location");
        exit();
    }

    public static function generateLoginHash(): string
    {
        return hash("sha512", $_SERVER["REMOTE_ADDR"] . $_SERVER["HTTP_USER_AGENT"]);
    }
}
