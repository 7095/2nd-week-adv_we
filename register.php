<?php
require('vendor/autoload.php');

//test for navigation after auth
//session_start();
//$_SESSION['auth']= true;
//session_destroy();


use aitsydney\Navigation;
use aitsydney\Account;

$nav= new Navigation();
$nav_items = $nav -> getNavigation();

//if request_method == post, user is submitting the register form
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    //create instance of account class
    $account = new account();
    $register = $account -> register($email,$password);
}
else{
    $register = '';
}

// create twig loader
//initialize twig templates
$loader = new Twig_Loader_Filesystem('templates');

//creat twig environment
$twig = new Twig_Environment($loader);


//load a twig template
$template = $twig -> load('register.twig');


//pass values to twig
echo $template -> render([
    'navigation' => $nav_items,
    'title' => 'Register for an account',
    'response' => $register
]);


?>