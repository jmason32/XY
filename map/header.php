<?php 
$root=pathinfo($_SERVER['SCRIPT_FILENAME']);
define ('BASE_FOLDER', basename($root['dirname']));
define ('SITE_ROOT',    realpath(dirname(__FILE__)));
define ('SITE_URL',    'http://'.$_SERVER['HTTP_HOST'].'/php/DMV');
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>DMV</title>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>/styles/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>/fonts/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>/styles/framework.css">
</head>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

