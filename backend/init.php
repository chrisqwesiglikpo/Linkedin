<?php

ob_start();
date_default_timezone_set("Africa/Accra");

session_start();



spl_autoload_register(function($class){
    include 'classes/'.$class.'.php';
});

define("DB_HOST", "localhost");
define("DB_NAME", "linkedin");
define("DB_USER", "root");
define("DB_PASS", "");
define("BASE_URL", "http://localhost/linkedin");


$account=new Account;
$loadFromUser=new User;
// $postControls=new PostControls;
// $loadFromPost=new Post;
// $loadFromFollow=new Follow;




require_once('functions.php');