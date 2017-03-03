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
     * Usage: Utilities::redirectTo($page);
     *
     * @var string $page ist optional und gibt die Seite an, auf die umgelenkt werden soll.
     *                   Für die Standardabläufe für die geschützen Seiten ist $page leer.
     */
    public static function redirectTo(string $page = null)
    {
        $redirect = false;
        // Falls keine spezielle Seite in $page übergeben wurde, wird das aufrufende Script verwendet
        if (!isset($page)) {
            $page = basename($_SERVER['SCRIPT_NAME']);
        }
        // Entscheiden, ob eine Umlenkung notwendig ist
        switch ($page) {
            case 'logout.php':
                // Nach dem Ausloggen wird die Startseite angezeigt
                $page = INDEX;
                $redirect = true;
                break;
            case 'login.php':
                if (isset($_SESSION[IS_LOGGED_IN]) && strcmp($_SESSION[IS_LOGGED_IN],
                        sha1($_SERVER["REMOTE_ADDR"] . $_SERVER["HTTP_USER_AGENT"])) === 0
                ) {
                    if (isset($_SESSION['redirect_url'])) {
                        // User wurde von einer geschützten Seite auf Login umgelenkt
                        $page = $_SESSION['redirect_url'];
                        //unset ($_SESSION['redirect_url']);
                    } else {
                        // User ist bereits eingeloggt und versucht das ein zweites Mal: Umlenkung auf Startseite.
                        $page = INDEX;
                    }
                    $redirect = true;
                } elseif (basename($_SERVER['SCRIPT_NAME']) === REGISTER) {
                    $page = LOGIN;
                    $redirect = true;
                }
                break;
            // Seite ist unter den durch Login geschützten Seiten
            case in_array($page, REDIRECT_PAGES):
                if (!isset($_SESSION[IS_LOGGED_IN]) || strcmp($_SESSION[IS_LOGGED_IN],
                        sha1($_SERVER["REMOTE_ADDR"] . $_SERVER["HTTP_USER_AGENT"])) !== 0
                ) {
                    // User ist noch nicht eingeloggt, daher zuerst zur Login-Seite und merken von welcher Seite man gekommen ist
                    $_SESSION['redirect_url'] = basename($_SERVER['SCRIPT_NAME']);
                    $page = LOGIN;
                    $redirect = true;
                } else {
                    if (!(strcmp(basename($_SERVER['SCRIPT_NAME']), $page) === 0)) {
                        // User ist eingeloggt und wird auf eine weitere geschützte Seite weitergeleitet (z.B. von mycart.php auf checkout.php)
                        $redirect = true;
                    } else {
                        // Jemand leitet ein Script auf sich selbst um, wir wollen aber keine Endlosschleife produzieren
                        $redirect = false;
                    }
                }
                break;
            default:
                // Keine Umlenkung notwendig oder bereits eingeloggt
                $redirect = false;
        }
        if ($redirect) {
            if (isset($_SERVER["HTTPS"]) && strcmp($_SERVER["HTTPS"], "on") === 0) {
                $schema = "https";
            } else {
                $schema = "http";
            }
            $host = $_SERVER['SERVER_NAME'];
            $port = $_SERVER['SERVER_PORT'];
            $uri = trim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
            $location = "Location: $schema://$host:$port/$uri/$page";
            // Umlenkung wird hier schon auf https durchgeführt, damit es nicht zu einer zweiten Umlenkung in session.inc.php kommt
            header("$location");
            exit;
        }
    }
}