<?php
/*---------------------------------------*/
/*----- Auto chargement des classes -----*/
/*---------------------------------------*/
function loadClass($class, $dirName = 'classes') {
    $dir = opendir($dirName);
    while($file = readdir($dir)) {
        if($file == '.' || $file == '..') continue;
        if(is_dir($dirName . '/' . $file)) {
            loadClass($class, $dirName . '/' . $file);
        } elseif($file == $class . '.php') {
            require_once($dirName . '/' . $file);
        }
    }
    closedir($dir);
}
spl_autoload_register('loadClass');

/*---------------------------------*/
/*----- Chargement des config -----*/
/*---------------------------------*/
require_once('config/db.php');