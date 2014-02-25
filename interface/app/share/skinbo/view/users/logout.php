<?php 
    $this->getBlock('design/header-admin', $data);
?>
    <h1 class="nom">Vous êtes maintenant déconnecté.</h1>
<?php
    $this->getParentBlock($data);
    $this->getBlock('design/footer-admin', $data);
?>
