<?php
require('clementine_commons.php');
?>
CKEDITOR.editorConfig = function( config )
{
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.toolbar = 'Clementine';
    config.stylesSet = 'Clementine';
    config.toolbar_Clementine = <?php echo $config['module_jstools']['ckeditor_toolbar']; ?>;
    config.templates_replaceContent = false;

<?php 
if (__CLEMENTINE_CKEDITOR_FILEMANAGER__ == 'kcfinder') {
?>

    config.filebrowserBrowseUrl = '../app/share/jstools/skin/js/ckeditor/plugins/kcfinder/browse.php?type=files';
    config.filebrowserImageBrowseUrl = '../app/share/jstools/skin/js/ckeditor/plugins/kcfinder/browse.php?type=images';
    config.filebrowserFlashBrowseUrl = '../app/share/jstools/skin/js/ckeditor/plugins/kcfinder/browse.php?type=flash';
    config.filebrowserUploadUrl = '../app/share/jstools/skin/js/ckeditor/plugins/kcfinder/upload.php?type=files';
    config.filebrowserImageUploadUrl = '../app/share/jstools/skin/js/ckeditor/plugins/kcfinder/upload.php?type=images';
    config.filebrowserFlashUploadUrl = '../app/share/jstools/skin/js/ckeditor/plugins/kcfinder/upload.php?type=flash';
<?php 
}
?>
};

CKEDITOR.stylesSet.add( 'Clementine',
[
    // définition des styles, comme dans http://docs.cksource.com/ckeditor_api/symbols/src/plugins_format_plugin.js.html
    // configuration dans $config['module_jstools']['ckeditor_styles'] et $config['module_jstools']['ckeditor_styles_{tagname}']
<?php
$styles = explode(',',  $config['module_jstools']['ckeditor_styles']);
$cnt = count($styles);
$styles_str = '';
for ($i = 0; $i < $cnt; ++$i) {
    if (isset($config['module_jstools']['ckeditor_styles_' . $styles[$i]])) {
        $styles_str .= "\r\n" . $config['module_jstools']['ckeditor_styles_' . $styles[$i]] . ",";
    }
}
echo substr($styles_str, 0, -1);
?>
]);

// MODIF PA : chargement du plugin d'upload
CKEDITOR.plugins.load('<?php echo __CLEMENTINE_CKEDITOR_FILEMANAGER__; ?>');
