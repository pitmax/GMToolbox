<?php
	$file = fopen('Musique.txt', 'w');
	fwrite($file, $_POST["Str_Mus"]);
	fclose($file);
	$file = fopen('Sfx.txt', 'w');
	fwrite($file, $_POST["Str_Sfx"]);
	fclose($file);
?>