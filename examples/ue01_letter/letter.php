<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Letter To A Friend</title>
    <link rel="stylesheet" href="../imar/normform/css/proceduralstyles.css">
</head>

<body>
<div id="container">
    <h3>Brief an einen Freund am Tag nach dem Fest</h3>
<?php
$freund = substr(trim($_GET["nachname"]),0,3);
$freund .= substr(trim($_GET["vorname"]),0,2);
$freund .= " ";
$freund .= substr(trim($_GET["schauspieler"]),0,2);
$freund .= substr(trim($_GET["ort"]),0,3);

$freund = strtoupper($freund);

$text = substr(trim($_GET["medikament"]), -3);
$text .= substr(trim($_GET["medikament"]), 0, 3);

$text = strtoupper($text);

echo "<div class='letter' style='text-align: center'><br><br><br><strong>Hallo $freund!<br></strong>Alles, was ich noch tippen kann, ist: <br><strong>$text</strong></div>";

echo "<div><a href='index.html'>Neuer Brief</a></div>";
?>
</div>
</body>
</html>