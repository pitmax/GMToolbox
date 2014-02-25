<?php 
if (!$data['return_json']) {
    $arr = array("active" => "users", "current" => "users");
    $this->getBlock('design/header-admin', $arr);
?>
<h1>Gestion des utilisateurs</h1>
<ul class="shortcut-buttons-set">
    <li>
        <a class="shortcut-button form_users_index_add" href="<?php echo __WWW__; ?>/users/create">
            <span>
                <img alt="icon" src="<?php echo __WWW_ROOT_SKINBO__; ?>/skin/images/icons/add.png" />
                <br/>Ajouter un utilisateur
            </span>
        </a>
    </li>
</ul>
<div class="spacer"></div>
<div class="content-box">
    <div class="content-box-header">
        <h3>Liste des utilisateurs</h3>
    </div>
    <div class="content-box-content">

<?php
}
$this->getParentBlock($data);
if (!$data['return_json']) {
?>
    </div>
</div>
<?php
    $this->getBlock('design/footer-admin', $data);
}
?>
