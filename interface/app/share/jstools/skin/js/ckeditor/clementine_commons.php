<?php 
header('Content-type: text/javascript; charset="utf-8"');
// php < 5.3 compatibility
// TODO : charger vraiment les overrides... pour l'instant on ne recupere que la valeur du module site...
$overrides = array('jstools' => 'share', 'site' => 'local');
$app_path = '../../../../../';
$config = array();
foreach ($overrides as $module => $scope) {
    $filepath = $app_path . $scope . '/' . $module . '/etc/config.ini';
    if (is_file($filepath)) {
        // php < 5.3 compatibility
        if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
            $tmp = parse_ini_file($filepath, true, INI_SCANNER_RAW);
        } else {
            $tmp = parse_ini_file($filepath, true);
        }
        if (is_array($tmp)) {
            $config = array_merge_recursive($config, $tmp);
        }
    }
}
foreach ($config as &$section) {
    foreach ($section as $key => $val) {
        if (is_array($val)) {
            $cnt = count($val);
            if ($cnt) {
                $section[$key] = $val[$cnt - 1];
            }
        }
    }
}
if (!defined('__CLEMENTINE_CKEDITOR_FILEMANAGER__')) {

    if (is_array($config) && isset($config['module_jstools']) && isset($config['module_jstools']['ckeditor_filemanager'])) {
        define('__CLEMENTINE_CKEDITOR_FILEMANAGER__',             $config['module_jstools']['ckeditor_filemanager']);
    } else {
        define('__CLEMENTINE_CKEDITOR_FILEMANAGER__',             'pgrfilemanager');
    }
} 
?>
