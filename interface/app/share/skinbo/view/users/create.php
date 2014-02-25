<?php 
    $arr = array("active" => "users", "current" => "addUsers");
    $this->getBlock('design/header-admin', $arr);
?>

    <h1>Gestion des utilisateurs</h1>

    <ul class="shortcut-buttons-set">
        <li>
            <a class="shortcut-button" href="<?php echo __WWW__; ?>/users/index" >
                <span>
                    <img alt="icon" src="<?php echo __WWW_ROOT_SKINBO__; ?>/skin/images/icons/back.png" />
                    <br/>Retour
                </span>
            </a>
        </li>
        <li>
            <a class="shortcut-button" href="#" onclick="document.forms[0].submit(); return false; " >
                <span>
                    <img alt="icon" src="<?php echo __WWW_ROOT_SKINBO__; ?>/skin/images/icons/save.png" />
                    <br/>Sauvegarder
                </span>
            </a>
        </li>
    </ul>
    <div class="spacer"></div>

    <div class="content-box">
        <div class="content-box-header">
            <h3>Création d'un compte utilisateur</h3>
        </div>
        <div class="content-box-content">

            <!-- detail de l'onglet -->
            <div id="generalites">
                <ul class="contenu">
                    <li>
<?php 
    $this->getParentBlock($data);
?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php 
    $this->getBlock('design/footer-admin', $data);
?>
