<?php
include 'error_handling.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset=UTF-8" />
    <title>Result</title>
</head>
<body>
<a href="javascript:history.back()">back</a>
<p>
    <?php
    echo "Eingabe: " . $_POST['myinput'];
    // Uncomment the following line to test error_handler
    //$x=0/0;
    ?>
</p>
</body>
</html>