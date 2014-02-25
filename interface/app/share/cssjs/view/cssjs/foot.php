<?php
// chargement des scripts du footer
$all_foots = $this->getModel('cssjs')->get_foots();
foreach ($all_foots as $foot) {
    echo $foot . "\n";
}
?>
