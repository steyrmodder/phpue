<?php
$var = "Test";
$source = <<<SOURCE
<h1>Sourcecode</h1> 
\$var = "Test"; <br>
echo 'Ein \$var für doppelte Hochkomma';<br>
echo 'Ein ' . \$var .' für doppetle Hochkomma';<br>
echo " Ein \$var für doppelte Hochkomma";<br>
SOURCE;
echo $source;
echo '<h1>Output</h1>';
echo 'Ein $var für doppelte Hochkomma <br>';
echo 'Ein ' . $var .' für doppetle Hochkomma <br>';
echo " Ein $var für doppelte Hochkomma <br>";