<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Datumskonvertierung</title>
    <link rel="stylesheet" href="../normform/css/proceduralstyles.css">
</head>

<body>
<div id="container">
    <h1>Datumskonvertierung mit Regular Expression</h1>
    <p>Das konvertierte Datum lautet:</p>
<?php
$date = $_POST["date"];

if (preg_match("/(^[0-9]{4})-([0-9]{1,2})-([[:digit:]]{1,2}$)/", $date, $matches)) {
    echo "<p>$matches[3].$matches[2].$matches[1]</p>";
}
else {
    echo "<p>Fehler! Ungültiges Format: $date</p>";
}
?>
</div>
</body>
</html>