<?php 
    $data['current']    = 'cms';
    $data['active']     = 'cmsindex';
    $this->getBlock('design/header-admin', $data);
?>

    <h1>Gestion de contenus</h1>

    <ul class="shortcut-buttons-set">
        <li id="clementine_cms_add_page"><a href="<?php echo __WWW__; ?>/cms/editpage" class="shortcut-button"><span>
            <img alt="icon" src="<?php echo __WWW_ROOT_SKINBO__; ?>/skin/images/icons/add.png" /><br />
            Créer une page
        </span></a></li>
    </ul>

    <div class="spacer"></div>

    <div class="content-box">
        <div class="content-box-header">
            <h3>Liste des pages</h3>
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
