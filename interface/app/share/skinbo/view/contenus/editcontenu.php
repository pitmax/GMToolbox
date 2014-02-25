<?php 
    $arr = array("active" => "cms", "current" => "editpage");
    $this->getBlock('design/header-admin', $arr);
?>

    <h1>Editer un contenu</h1>

    <ul class="shortcut-buttons-set">
        <li>
            <a class="shortcut-button" href="<?php echo __WWW__; ?>/cms/editpage?id=<?php echo $data['page']; ?>" >
                <span>
                    <img alt="icon" src="<?php echo __WWW_ROOT_SKINBO__; ?>/skin/images/icons/back.png" />
                    <br/>Retour
                </span>
            </a>
        </li>
        <li>
            <a class="shortcut-button" href="#" onclick="jQuery('#form_content_edit_submit input').each(function() {
                    /* fix pour ckeditor */
                    if (jQuery().ckeditor) {
                        try {
                            jQuery('textarea').ckeditor(function(){
                                this.destroy();
                            });
                        } catch (e) {
                            // exception : si le destroy provoque un plantage on ne veut pas pour autant que le formulaire ne soit pas sauve
                            erreur = e;
                        }
                    }
                });
                jQuery('form[name=add_content]').submit();
                return false; " >
                <span>
                    <img alt="icon" src="<?php echo __WWW_ROOT_SKINBO__; ?>/skin/images/icons/save.png" />
                    <br/>Sauvegarder
                </span>
            </a>
        </li>
    </ul>
    <div class="spacer"></div>

<?php 
    $this->getParentBlock($data);
    $this->getBlock('design/footer-admin', $data);
?>
