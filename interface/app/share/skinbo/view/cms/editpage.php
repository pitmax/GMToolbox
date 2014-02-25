<?php 
    $data['current']    = 'cms';
    $data['active']     = 'cmsindex';
    $this->getBlock('design/header-admin', $data);
?>

    <!-- titre de la page -->
<?php
    if (isset($data['page']) && $data['page']) {
?>
    <h1>Editer une page</h1>
<?php
    } else {
?>
    <h1>Ajouter une page</h1>
<?php
    }
?>

    <!-- boutons top -->
    <ul class="shortcut-buttons-set">
        <li>
            <a class="shortcut-button" href="<?php echo __WWW__; ?>/cms" >
                <span>
                    <img alt="icon" src="<?php echo __WWW_ROOT_CMS__; ?>/skin/images/icons/back.png" />
                    <br/>Retour
                </span>
            </a>
        </li>
        <li>
<?php
    if (isset($data['page']) && $data['page']) {
?>
            <a class="shortcut-button" target="_blank" href="<?php echo __WWW__; ?>/<?php echo $data['page']['slug']; ?>" >
                <span>
                    <img alt="icon" src="<?php echo __WWW_ROOT_CMS__; ?>/skin/images/icons/preview-doc.png" />
                    <br />Voir la page
                </span>
            </a>
<?php
    }
?>
        </li>
    </ul>

    <div class="spacer"></div>

    <!-- formulaire parametres de la page -->
    <form name="edit_page" method="post" action="<?php echo __WWW__; ?>/cms/editpage?id=<?php
    if (isset($data['page']['id'])) {
        echo $data['page']['id']; 
    }
?>" enctype="multipart/form-data">
    <div class="content-box">
        <div class="content-box-header">
            <h3>Paramètres de la page</h3>
        </div>
        <div class="content-box-content">
<?php 
    $this->getBlock('cms/editpage_baseparams', $data);
?>
        </div>
    </div>

<?php 
    $this->getBlock('cms/editpage_contenus', $data);
?>
    </form>
<?php
    $this->getBlock('design/footer-admin', $data);
?>
