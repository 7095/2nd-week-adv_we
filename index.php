<?php
require('vendor/autoload.php');

//test for navigation after auth
//session_start();
//$_SESSION['auth']= true;
//session_destroy();


use aitsydney\Navigation;

$nav= new Navigation();
$nav_items = $nav -> getNavigation();


use aitsydney\Product;

$products = new Product();
$products_result = $products -> getproducts();

use aitsydney\Category;
$cat = new Category();
$categories = $cat -> getCategories();

// create twig loader
//initialize twig templates
$loader = new Twig_Loader_Filesystem('templates');

//creat twig environment
$twig = new Twig_Environment($loader);


//load a twig template
$template = $twig -> load('home.twig');


//pass values to twig
echo $template -> render([
    'categories' =>$categories,
    'navigation' => $nav_items,
    'products' => $products_result,
    'title' => 'Hello Shop'
]);

?>