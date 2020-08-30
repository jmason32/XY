<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Reviews System</title>
		<!-- <link href="../style.css" rel="stylesheet" type="text/css"> -->
		<link href="../styles/reviews.css" rel="stylesheet" type="text/css">

        <style>

            * {
                box-sizing: border-box;
                font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
                font-size: 16px;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }
            body {
                background-color: #FFFFFF;
                margin: 0;
            }
            .navtop {
                background-color: #3f69a8;
                height: 60px;
                width: 100%;
                border: 0;
            }
            .navtop div {
                display: flex;
                margin: 0 auto;
                width: 1000px;
                height: 100%;
            }
            .navtop div h1, .navtop div a {
                display: inline-flex;
                align-items: center;
            }
            .navtop div h1 {
                flex: 1;
                font-size: 24px;
                padding: 0;
                margin: 0;
                color: #ecf0f6;
                font-weight: normal;
            }
            .navtop div a {
                padding: 0 20px;
                text-decoration: none;
                color: #c5d2e5;
                font-weight: bold;
            }
            .navtop div a i {
                padding: 2px 8px 0 0;
            }
            .navtop div a:hover {
                color: #ecf0f6;
            }
            .content {
                width: 1000px;
                margin: 0 auto;
            }
            .content h2 {
                margin: 0;
                padding: 25px 0;
                font-size: 22px;
                border-bottom: 1px solid #ebebeb;
                color: #666666;
            }

        </style>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    </head>