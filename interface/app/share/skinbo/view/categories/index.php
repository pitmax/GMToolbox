<?php 
    $arr = array("active" => "categories", "current" => "categories");
    $this->getBlock('design/header-admin', $arr);
?>
<h1>Gestion des categories</h1>
<div class="content-box">
    <div class="content-box-header">
        <h3>Liste des categories</h3>
    </div>
    <div class="content-box-content">

<?php
    $this->getParentBlock($data);
?>
    </div>
</div>
<?php
    $this->getBlock('design/footer-admin', $data);
?>
