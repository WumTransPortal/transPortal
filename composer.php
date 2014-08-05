<?php
//die();
exec("php6 composer.phar update", $out, $ret);
var_dump($out);
echo "<pre>$ret</pre>";

?>