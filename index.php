<?php

require __DIR__ . "/inc/bootstrap.php";
require PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

// all of our endpoints start with /user
// everything else results in a 404 Not Found
if ($uri[2] !== 'user') {
    header("HTTP/1.1 404 Not Found");
    exit();
}

if ((isset($uri[2]) && $uri[2] != 'user') || !isset($uri[3])) {
    //echo($uri[1] + " " + $uri[2]);
    header("HTTP/1.1 404 Not Found");
    exit();
}


//echo (PROJECT_ROOT_PATH);
$objFeedController = new UserController();
$strMethodName = $uri[3] . 'Action'; //e.g. see listAction

// Call the controller action
$objFeedController->{$strMethodName}();
//echo ($strMethodName);
?>