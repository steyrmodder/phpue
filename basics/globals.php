<?php
/**
 * The keyword global makes a variable defined outside visible inside a function.
 */
$text='OUTSIDE'; // comment out this line to test global scope
//global $text; // comment out or uncomment this line to see, that it is useless
/**
 * Look at output to see, how global keyword works
 * Output of function test is differnt from output produced outside function test
 */

function test () {
    global $text; // comment out this line, to see how global keyword works
    echo 'text inside before overwritting: ' . $text . '<br>';
    $text= 'INSIDE';
    echo 'text inside after overwritting: ' . $text . '<br>';
}
echo 'text outside before calling test(): ' . $text . '<br>';

/**
 * call function test, defined above
 */
test();
/**
 * Look at output to see, how global keyword works
 */
echo 'text outside after calling test(): ' . $text . '<br>';
