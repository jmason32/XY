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
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css" rel="stylesheet">
        <link href = "https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href = "https://fonts.googleapis.com/css?family=Architects+Daughter|Roboto&amp;subset=latin,devanagari" rel="stylesheet">
        <link href= "https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
        
    </head>
    <style>

        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        } 

        main {
            flex: 1 0 auto;
        }

        h1.title,
        .footer-copyright a {
            font-family: 'Architects Daughter', cursive;
            text-transform: uppercase;
            font-weight: 900;
        }

        /* start welcome animation */

        body.welcome {
            background: #512da8;
            overflow: hidden;
            -webkit-font-smoothing: antialiased;
        }

        .welcome .splash {
            height: 0px;
            padding: 0px;
            border: 130em solid #039be5;
            position: fixed;
            left: 50%;
            top: 100%;
            display: block;
            box-sizing: initial;
            overflow: hidden;

            border-radius: 50%;
            transform: translate(-50%, -50%);
            animation: puff 0.5s 1.8s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards, borderRadius 0.2s 2.3s linear forwards;
        }

        .welcome #welcome {
            background: #311b92 ;
            width: 56px;
            height: 56px;
            position: absolute;
            left: 50%;
            top: 50%;
            overflow: hidden;
            opacity: 0;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            animation: init 0.5s 0.2s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards, moveDown 1s 0.8s cubic-bezier(0.6, -0.28, 0.735, 0.045) forwards, moveUp 1s 1.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards, materia 0.5s 2.7s cubic-bezier(0.86, 0, 0.07, 1) forwards, hide 2s 2.9s ease forwards;
        }
        
        /* moveIn */
        .welcome header,
        .welcome a.btn {
            opacity: 0;
            animation: moveIn 2s 3.1s ease forwards;
        }

        @keyframes init {
        0% {
            width: 0px;
            height: 0px;
        }
        100% {
            width: 56px;
            height: 56px;
            margin-top: 0px;
            opacity: 1;
        }
        }

        @keyframes puff {
        0% {
            top: 100%;
            height: 0px;
            padding: 0px;
        }
        100% {
            top: 50%;
            height: 100%;
            padding: 0px 100%;
        }
        }

        @keyframes borderRadius {
        0% {
            border-radius: 50%;
        }
        100% {
            border-radius: 0px;
        }
        }

        @keyframes moveDown {
        0% {
            top: 50%;
        }
        50% {
            top: 40%;
        }
        100% {
            top: 100%;
        }
        }

        @keyframes moveUp {
        0% {
            background: #311b92;
            top: 100%;
        }
        50% {
            top: 40%;
        }
        100% {
            top: 50%;
            background: #039be5;
        }
        }

        @keyframes materia {
        0% {
            background: #039be5;
        }
        50% {
            background: #039be5;
            top: 26px;
        }
        100% {
            background: #311b92;
            width: 100%;
            height: 64px;
            border-radius: 0px;
            top: 26px;
        }
        }

        @keyframes moveIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
        }

        @keyframes hide {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 0;
        }
        } 
    </style>

