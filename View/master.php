<?php
include 'header.php';

if (!isset($viewHead))
    $viewHead = "";
if (!isset($viewContent))
    $viewContent = "";


$stylesBundle = "";
if (file_exists("View\stylesBundle.html"))
    $stylesBundle = file_get_contents("View\stylesBundle.html");
$scriptsBundle = "";
if (file_exists("View\scriptBundle.html"))
    $scriptsBundle = file_get_contents("View\scriptBundle.html");
if (!isset($viewScript))
    $viewScript = "";
if (!isset($viewStyle))
    $viewStyle = "";



echo <<<HTML
    <!DOCTYPE html>
    <html>
    <header>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        $stylesBundle
        $viewStyle
    </header>
    <body>
        <div id="main">
                $viewHead
            <div id="content">
                $viewContent
            </div>
        </div>
        $scriptsBundle
        $viewScript
    </body>
    </html>
    HTML;
?>