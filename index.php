<?php 

define('BASEPATH',__DIR__);
define('PRODUCTION',false);

require __DIR__.'/libs/Utils.php';
includeDir(__DIR__.'/libs');
includeDir(__DIR__.'/models');
includeDir(__DIR__.'/services');
includeDir(__DIR__.'/controllers');
$r = new R();
// require __DIR__.'/controllers/BaseController.php';
// require __DIR__.'/controllers/JwtController.php';
// require __DIR__.'/controllers/IndexController.php';
// require __DIR__.'/controllers/ProductController.php';


$r->route('/home',['IndexController','index']);
$r->route('/api/v1/products',['ProductController','index']);

$r->exec();
