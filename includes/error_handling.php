<?php
define ('DEBUG',true);
//error_reporting(E_ALL);
//error_reporting(E_WARNING);
//error_reporting(E_STRICT);
//error_reporting(E_NOTICE);
//error_reporting(E_USER_ERROR);
set_error_handler('my_error_handler');

function my_error_handler ($errno, $error, $file, $line, $context) {
    ob_start();
    var_dump($context);
    $out1 = ob_get_contents();
    ob_clean();
    // PHP Call Stack vom Ausgabepuffer in eine Zwischenvariable schreiben und leeren, sodass nichts mehr direkt in den Browser ausgegeben wird
    ob_start();
    debug_print_backtrace();
    $out2 = ob_get_contents();
    // Das Ganze noch etwas lesbarer formatieren
    $phpcallstack = str_replace('#', '<br>#', $out2);
    ob_clean();
    $debugpage = <<<ERROR
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DEBUG Error Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
    <div>
    <!-- Styles not needed for IMAR, therefore not in css. So its easier to reuse IMAR -->
<style type="text/css" scoped>
    {literal}
    p {text-align:left;
        color: red;
        font: 20px arial, sans-serif;
        }
    {/literal}
</style>
        <p class='warning'><td><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Warning: $error in $file:$line</p>
    </div>
    <div>
        <p>Full Context</p>
        $out1
    </div>
    <div>
        <p>Full PHP Callstack</p>
        $phpcallstack
    </div>
</body>
</html>
ERROR;
    if (DEBUG) {
        print $debugpage;
        exit;
    } else {
        error_log($debugpage . $out1);
        header("Location: errorpage.html");
        exit;
    }
}