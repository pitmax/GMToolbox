<?php
    $this->getParentBlock($data);
?>
        jQuery('tbody').each (function() {
            jQuery(this).find('tr:odd').removeClass("alt-row"); // Remove class "alt-row" on odd table rows
            jQuery(this).find('tr:even').addClass("alt-row"); // Add class "alt-row" to even table rows
        });
