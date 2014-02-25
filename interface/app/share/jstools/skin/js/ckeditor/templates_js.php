<?php
require('clementine_commons.php');
?>

CKEDITOR.addTemplates( 'default',
{
    // The name of sub folder which hold the shortcut preview images of the
    // templates.
    imagesPath : CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'templates' ) + 'templates/images/' ),

    // définition des templates
    // configuration dans $config['module_jstools']['ckeditor_templates'] et $config['module_jstools']['ckeditor_templates_{templatename}']

    // The templates definitions.
    templates :
    [
<?php
$templates = explode(',',  $config['module_jstools']['ckeditor_templates']);
$cnt = count($templates);
$templates_str = '';
for ($i = 0; $i < $cnt; ++$i) {
    if (isset($config['module_jstools']['ckeditor_templates_' . $templates[$i]])) {
        $templates_str .= "\r\n" . $config['module_jstools']['ckeditor_templates_' . $templates[$i]] . ",";
    }
}
echo substr($templates_str, 0, -1);
?>
    ]
});
