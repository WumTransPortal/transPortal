<?php

$string = "<h1>Heading</h1><p>jsjsjjs</p><h1>Heading2</h1><p>part2</p>";

$steps = explode('<h1>', $string);

var_dump($steps);

?>