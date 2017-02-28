<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Date Conversion</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../vendor/normform/css/main.css">
</head>
<body class="Site">
<header class="Site-header">
    <div class="Header Header--small">
        <div class="Header-titles">
            <h1 class="Header-title"><i class="fa fa-calendar" aria-hidden="true"></i>Date Conversion</h1>
            <p class="Header-subtitle">Using Regular Expressions</p>
        </div>
    </div>
</header>
<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Conversion Result</h2>
            <?php
            if (isset($_POST["date"]) && strlen($_POST["date"]) !== 0) {
                $date = $_POST["date"];

                if (preg_match("/(^[0-9]{4})-([0-9]{1,2})-([[:digit:]]{1,2}$)/", $date, $matches)) {
                    echo "<p>$matches[3].$matches[2].$matches[1]</p>";
                }
                else {
                    echo "<p>Error: Invalid format \"$date\".</p>";
                }
            }
            else {
                echo "<p>Error: No input specified.</p>";
            }
            ?>
            <a href="index.html">Start Over</a>
        </div>
    </section>
</main>
<footer class="Site-footer">
    <div class="Footer Footer--small">
        <p class="Footer-credits">Created and maintained by <a href="mailto:martin.harrer@fh-hagenberg.at">Martin Harrer</a> and <a href="mailto:wolfgang.hochleitner@fh-hagenberg.at">Wolfgang Hochleitner</a>.</p>
        <p class="Footer-version"><i class="fa fa-calendar" aria-hidden="true"></i><a href="https://github.com/Digital-Media/phpue">Date Conversion Version 2017</a></p>
    </div>
</footer>
</body>
</html>
