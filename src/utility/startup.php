<?php

session_start();

$project = "turingTest";
$homeUrl = "http://turing.religionandstory.com";

function includeHeadInfo()
{
    include("$_SERVER[DOCUMENT_ROOT]/../common/html/head.html");
    echo '<link rel="shortcut icon" type="image/png" href="http://turing.religionandstory.com/images/logo.png"/>
          <link rel="apple-touch-icon" sizes="57x57" href="http://turing.religionandstory.com/images/logo-57.png" />
          <link rel="apple-touch-icon" sizes="60x60" href="http://turing.religionandstory.com/images/logo-60.png" />
          <link rel="apple-touch-icon" sizes="72x72" href="http://turing.religionandstory.com/images/logo-72.png" />
          <link rel="apple-touch-icon" sizes="114x114" href="http://turing.religionandstory.com/images/logo-114.png" />
          <link rel="apple-touch-icon" sizes="120x120" href="http://turing.religionandstory.com/images/logo-120.png" />
          <link rel="apple-touch-icon" sizes="144x144" href="http://turing.religionandstory.com/images/logo-144.png" />
          <link rel="apple-touch-icon" sizes="152x152" href="http://turing.religionandstory.com/images/logo-152.png" />';
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
    echo "http://religionandstory.com/common/images/question-mark.png";
}

function getConstructionImage()
{
    echo "https://image.freepik.com/free-icon/traffic-cone-signal-tool-for-traffic_318-62079.jpg";
}

?>