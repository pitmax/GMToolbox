<?php
// chargement des css
$all_css = $this->getModel('cssjs')->get_css();
foreach ($all_css as $css) {
    if (is_array($css)) {
?>
        <link 
            rel="<?php echo (isset($css['rel'])) ? $css['rel'] : 'stylesheet'; ?>" 
            type="<?php echo (isset($css['type'])) ? $css['type'] : 'text/css'; ?>" 
            media="<?php echo (isset($css['media'])) ? $css['media'] : 'screen'; ?>" 
            href="<?php echo $css['src']; ?>" /> 
<?php 
    } else {
        echo $css . "\n";
    }
}

// chargement des js
$all_js = $this->getModel('cssjs')->get_js();
foreach ($all_js as $js) {
    if (is_array($js)) {
?>
        <script type="text/javascript" src="<?php echo $js['src']; ?>"></script>
<?php 
    } else {
        echo $js . "\n";
    }
}

// chargement des scripts du head
$all_heads = $this->getModel('cssjs')->get_heads();
foreach ($all_heads as $head) {
    echo $head . "\n";
}
?>