<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Crafting Text</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../vendor/normform/css/main.css">
</head>
<body class="Site">
<header class="Site-header">
    <div class="Header Header--small">
        <div class="Header-titles">
            <h1 class="Header-title"><i class="fa fa-scissors" aria-hidden="true"></i>Crafting Text</h1>
            <p class="Header-subtitle">Using String Functions</p>
        </div>
    </div>
</header>
<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Crafting Results</h2>
            <h3>Trim, Substring, & Concatenation</h3>
            <?php
            $output1 = substr(trim($_GET["text1"]), 0, 3);
            $output1 .= " ";
            $output1 .= substr(trim($_GET["text2"]), -4);
            $output1 .= " ";
            $output1 .= substr(trim($_GET["text3"]), -3, -1);

            echo "<p>Substrings of fragments 1, 2 and 3 added togeter: <strong>$output1</strong></p>";
            ?>

            <h3>Character Replacement & Case Conversion</h3>
            <?php
            $replacement = ["a" => "e", "i" => "o", "u" => "a"];
            $output2 = strtr($_GET["text1"], $replacement);
            $output2 = strtoupper($output2);

            echo "<p>Vowels in fragment 1 replaced and converted to upper case: <strong>$output2</strong></p>";
            ?>

            <h3>Comparison</h3>

            <?php
            $comparison = strcmp($_GET["text1"], $_GET["text2"]);

            if ($comparison < 0) {
                $output3 = "less than";
            }
            elseif ($comparison > 0) {
                $output3 = "greater than";
            }
            else {
                $output3 = "equal to";
            }

            echo "<p>Compared lexicographically, fragment 1 is <strong>$output3</strong> fragment 2.</p>";
            ?>
            <a href="index.html">Start Over</a>
        </div>
    </section>
</main>
</body>
</html>
