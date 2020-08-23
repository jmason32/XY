<?php 
$root=pathinfo($_SERVER['SCRIPT_FILENAME']);
define ('BASE_FOLDER', basename($root['dirname']));
define ('SITE_ROOT',    realpath(dirname(__FILE__)));
define ('SITE_URL',    'http://'.$_SERVER['HTTP_HOST'].'/php/XY');
?>

<!DOCTYPE html>
<html>
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
        <title>DMV</title>
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
        <link rel="stylesheet" type="text/css" href="styles/framework.css">
        <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    </head>

    <body>
