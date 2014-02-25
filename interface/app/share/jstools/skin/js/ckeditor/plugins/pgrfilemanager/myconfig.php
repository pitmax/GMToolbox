<?php
/*
Copyright (c) 2009 Grzegorz Żydek

This file is part of PGRFileManager v2.1.0

Permission is hereby granted, free of charge, to any person obtaining a copy
of PGRFileManager and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

PGRFileManager IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

//Include your own script with authentication if you wish
//i.e. include($_SERVER['DOCUMENT_ROOT'].'/_files/application/PGRFileManagerConfig.php');

// MODIF PA
//real absolute path to root directory (directory you want to use with PGRFileManager) on your server  
//i.e  PGRFileManagerConfig::$rootPath = '/home/user/htdocs/userfiles'
//you can check your absoulte path using
// PGRFileManagerConfig::$rootPath = '/home/user/htdocs/userfiles';
//url path to root directory
//this path is using to display images and will be returned to ckeditor with relative path to selected file
//i.e http://my-super-web-page/gallery
//i.e /gallery
// PGRFileManagerConfig::$urlPath = '/userfiles';
$basepath = realpath(preg_replace('/\/[^\/]*$/', '', __FILE__));
$basepath = realpath($basepath . '/../../../../../../../../');

// php < 5.3 compatibility
// TODO : charger vraiment les overrides... pour l'instant on ne recupere que la valeur du module site...
$overrides = array('jstools' => 'share', 'site' => 'local');
$config = array();
foreach ($overrides as $module => $scope) {
    $filepath = $basepath . '/app/' . $scope . '/' . $module . '/etc/config.ini';
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


if (is_array($config) && isset($config['module_jstools'])) {
    define('__CLEMENTINE_JSTOOLS_CKEDITOR_PGRFILEMANAGER_FILEMAXSIZE__', $config['module_jstools']['pgrfilemanager_filemaxsize']);
    define('__CLEMENTINE_JSTOOLS_CKEDITOR_PGRFILEMANAGER_ALLOWEDEXTENSIONS__', $config['module_jstools']['pgrfilemanager_allowedextensions']);
    define('__CLEMENTINE_JSTOOLS_CKEDITOR_PGRFILEMANAGER_IMAGEEXTENSIONS__', $config['module_jstools']['pgrfilemanager_imageextensions']);
    define('__CLEMENTINE_JSTOOLS_CKEDITOR_PGRFILEMANAGER_IMAGEMAXWIDTH__', $config['module_jstools']['pgrfilemanager_imagemaxwidth']);
    define('__CLEMENTINE_JSTOOLS_CKEDITOR_PGRFILEMANAGER_IMAGEMAXHEIGHT__', $config['module_jstools']['pgrfilemanager_imagemaxheight']);
}

if (!session_id()) {
    session_start();
}
if (!(isset($_SESSION['auth'])) && count(isset($_SESSION['auth']))) {
    // protection sommaire : pas de gestion de droits
    die('desactive');
}
$baseurl = substr($basepath, strlen(preg_replace('/\/$/', '', $_SERVER['DOCUMENT_ROOT'])));
PGRFileManagerConfig::$rootPath = realpath($basepath . '/files/media');
PGRFileManagerConfig::$urlPath = 'http://' . $_SERVER['SERVER_NAME'] . $baseurl . '/files/media';


//    !!!How to determine rootPath and urlPath!!!
//    1. Copy mypath.php file to directory which you want to use with PGRFileManager
//    2. Run mypath.php script, i.e http://my-super-web-page/gallery/mypath.php
//    3. Insert correct values to myconfig.php
//    4. Delete mypath.php from your root directory


//Max file upload size in bytes
PGRFileManagerConfig::$fileMaxSize = __CLEMENTINE_JSTOOLS_CKEDITOR_PGRFILEMANAGER_FILEMAXSIZE__;
//Allowed file extensions
//PGRFileManagerConfig::$allowedExtensions = '' means all files
PGRFileManagerConfig::$allowedExtensions = __CLEMENTINE_JSTOOLS_CKEDITOR_PGRFILEMANAGER_ALLOWEDEXTENSIONS__;
//Allowed image extensions
PGRFileManagerConfig::$imagesExtensions = __CLEMENTINE_JSTOOLS_CKEDITOR_PGRFILEMANAGER_IMAGEEXTENSIONS__;
//Max image file height in px
PGRFileManagerConfig::$imageMaxHeight = __CLEMENTINE_JSTOOLS_CKEDITOR_PGRFILEMANAGER_IMAGEMAXHEIGHT__;
//Max image file width in px
PGRFileManagerConfig::$imageMaxWidth = __CLEMENTINE_JSTOOLS_CKEDITOR_PGRFILEMANAGER_IMAGEMAXWIDTH__;
//Thanks to Cycle.cz
//Allow or disallow edit, delete, move, upload, rename files and folders
PGRFileManagerConfig::$allowEdit = true;		// true - false
//Autorization
PGRFileManagerConfig::$authorize = false;        // true - false
PGRFileManagerConfig::$authorizeUser = 'user';
PGRFileManagerConfig::$authorizePass = 'password';
//Path to CKEditor script
//i.e. http://mypage/ckeditor/ckeditor.js
//PGRFileManagerConfig::$ckEditorScriptPath = '/ckeditor/ckeditor.js';
//File extensions editable by CKEditor
//PGRFileManagerConfig::$ckEditorExtensions = 'html|html|txt';
