<?php
// Initialisation du projet
ini_set('error_reporting', -1);
ini_set('display_errors', 1);
/*$config = parse_ini_file('sound/medieval.ini', true);*/
$config = simplexml_load_file('test.xml');
// TODO: xml
echo '<pre>';
print_r($config);
echo '</pre>';
?>
