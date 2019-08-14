<?php
require('vendor/autoload.php');

use aitsydney\Navigation;

$nav= new Navigation();
$nav_items = $nav -> getNavigation();

use aitsydney\ProductDetail;

// get the product id from the index url parameter
if (isset($_GET['product_id'] ) == false){
    echo "no parameter set";
    exit();
}

//create an instance of productdeatil class
$pd= new ProductDetail();
$detail= $pd -> getProductDetail($_GET['product_id']);

// create twig loader
//initialize twig templates
$loader = new Twig_Loader_Filesystem('templates');

//creat twig environment
$twig = new Twig_Environment($loader);


//load a twig template
$template = $twig -> load('detail.twig');


//pass values to twig
echo $template -> render([
    'Navigation' => $nav_items,
    'detail' => $detail,
    'title' => $detail['product']['name']
]);

?>