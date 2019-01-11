<?php

session_start();

$project = "turingTest";
$homeUrl = "https://turing.religionandstory.com";
$style   = "red";

function includeHeadInfo()
{
    global $style;
    include("$_SERVER[DOCUMENT_ROOT]/../common/html/head.php");
    echo '<link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">';
    echo '<style>
              :root {
                 --mainColor:   #9D2235;
                 --hoverColor:  #BD4255;
                 --normalFont:  "Times New Roman", serif;
                 --titleFont:   "Abril Fatface", serif;
                 --titleWeight: normal;
              }
          </style>';
}

function includeHeader()
{
    global $homeUrl;
    include("$_SERVER[DOCUMENT_ROOT]/../common/html/header.php");
}

function includeModals()
{
    include("$_SERVER[DOCUMENT_ROOT]/../common/html/modal.html");
    include("$_SERVER[DOCUMENT_ROOT]/../common/html/toaster.html");
}

function getHelpImage()
{
    echo "https://religionandstory.com/common/images/question-mark.png";
}

function getConstructionImage()
{
    echo "https://image.freepik.com/free-icon/traffic-cone-signal-tool-for-traffic_318-62079.jpg";
}

?>