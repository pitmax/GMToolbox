<?php
$request = $this->getRequest();
if (!$request->AJAX) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title></title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="robots" content="index, follow, all" />
        <meta http-equiv="Content-Type" content="application/xhtml+xml;charset=<?php echo __HTML_ENCODING__; ?>" />
<?php
    if (Clementine::$config['module_jstools']['use_google_cdn']) {
        $this->getModel('cssjs')->register_js('jquery', array('src' => 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'));
    } else {
        $this->getModel('cssjs')->register_js('jquery', array('src' => __WWW_ROOT_JSTOOLS__ . '/skin/jquery/jquery.min.js'));
    }
    $this->getModel('cssjs')->register_css('jquery.colorbox', array('src' => __WWW_ROOT_JSTOOLS__ . '/skin/colorbox/colorbox.css', 'media' => 'screen'));
    $this->getModel('cssjs')->register_js('jquery.colorbox', array('src' => __WWW_ROOT_JSTOOLS__ . '/skin/colorbox/jquery.colorbox-min.js'));
    $this->getModel('cssjs')->register_js('jquery.textbox', array('src' => __WWW_ROOT_JSTOOLS__ . '/skin/js/jquery.textbox/jquery.textbox.js'));
    $this->getModel('cssjs')->register_css('jquery.textbox', array('src' => __WWW_ROOT_JSTOOLS__ . '/skin/js/jquery.textbox/jquery.textbox.css'));
    $this->getModel('cssjs')->register_js('skinbo', array('src' => __WWW_ROOT_SKINBO__ . '/skin/js/skinbo.js'));
    $this->getModel('cssjs')->register_css('skinbo', array('src' => __WWW_ROOT_SKINBO__ . '/skin/css/skinbo.css'));
    $this->getModel('cssjs')->register_js('paging', array('src' => __WWW_ROOT_SKINBO__ . '/skin/js/paging.js'));
    $this->getModel('cssjs')->register_css('paging', array('src' => __WWW_ROOT_SKINBO__ . '/skin/css/paging.css'));
    $this->getBlock('cssjs/head', $data);
?>
    </head>
    <body>
        <div id="general">
            <div id="left">
                <div class="logo">
                    <a target="_blank" href="<?php echo __WWW__; ?>">
                        <?php echo Clementine::$config['clementine_global']['site_name']; ?>
                    </a>

                    <!-- liens de changement de langue -->
                    <div class="langue">
<?php
    $lang_dispo = array_keys($request->EQUIV);
    if (count($lang_dispo) > 1) {
        foreach ($lang_dispo as $lang) {
?>
                        <a <?php
            if ($request->LANG == $lang) {
?>
class="active"
<?php 
            }
            ?> href="<?php echo $request->EQUIV[$lang]; ?>"><img src="<?php echo __WWW_ROOT_SKINBO__ ?>/skin/images/<?php echo $lang; ?>.png" /></a>
<?php 
        }
    }
?>
                    </div>
                </div>
                <div class="spacer"></div>
                <div class="deconnexion">
<?php
    // on n'affiche le lien de deconnexion que si l'utilisateur est bien loggue
    if ($this->getModel('users')->getAuth()) {
?>
                    <a href="<?php echo $this->getModel('users')->getUrlLogout(); ?>">Déconnexion</a>
<?php 
    }
?>
                </div>
<?php
    if (isset($data['active'])) {
        $active = $data["active"];
    } else {
        $active = '';
    }
    if (isset($data['current'])) {
        $current = $data["current"];
    } else {
        $current = '';
    }
?>
                <ul id="main-nav">
                    <li>
                        <a target="_blank" href="<?php echo __WWW__; ?>" class="<?php echo ($active == "accueil") ? 'current' : ''; ?>">Voir le site</a>
                    </li>
<?php
    // on n'affiche le menu que si l'utilisateur est bien loggue
    if ($this->getModel('users')->getAuth()) {
        $this->getBlock('design/menu_admin', $data);
    }
?>
                </ul>
                <div class="spacer"></div>
            </div>
            <div id="right">
<?php
}
?>
