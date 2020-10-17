<?php

function includeDir($path)
{
    $dir = new \RecursiveDirectoryIterator($path);
    $iterator = new \RecursiveIteratorIterator($dir);
    foreach ($iterator as $file) {
        $fname = $file->getFilename();
        if (preg_match('%\.php$%', $fname)) {
            if($fname != 'index.php') require_once $file->getPathname();
        }
    }
}

function includeDirClass($path,$basePath = BASEPATH ,$server='')
{
    $dir = new \RecursiveDirectoryIterator($path);
    $iterator = new \RecursiveIteratorIterator($dir);
    foreach($iterator as $file) {
        $fname = $file->getFilename();
        if(preg_match('%\.php$%', $fname)) {
            if($fname != 'index.php') {
                require_once $file->getPathname();
                $className = basename($fname, '.php');
                $server->addClass($className, $basePath);
            }
        }
    }
}