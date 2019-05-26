<?php
session_start();

$project    = "turingTest";
$siteTitle  = "Religious Turing Test";
$pageTitle  = "Turing Test";
$image      = "https://reviews.religionandstory.com/images/reviews.jpg";
$description= "This test measures how well individuals know the religious views of different groups, including denominations, world religions, and ideologies like liberal and conservative.";
$keywords   = "Turing Test,religion,faith,denomination,Christian,group,tribe,liberal,conservative,quiz";
$homeUrl    = "https://turing.religionandstory.com";
$style      = "red";

function getRootPath()
{
    $public = "public_html";
    $path = $_SERVER['DOCUMENT_ROOT'];
    $length = strpos( $path, $public ) + strlen( $public );
    return substr( $path, 0, $length ) . "/";
}

function getSubPath()
{
    return getRootPath() . "turing/";
}

function includeHeadInfo()
{
    global $siteTitle;
    global $pageTitle;
    global $image;
    global $description;
    global $keywords;
    global $style;
    include(getRootPath() . "common/html/head.php");
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
    include(getRootPath() . "common/html/header.php");
}

function includeModals()
{
    include(getRootPath() . "common/html/modal.html");
    include(getRootPath() . "common/html/modal-binary.html");
    include(getRootPath() . "common/html/modal-prompt.html");
    include(getRootPath() . "common/html/modal-prompt-big.html");
    include(getRootPath() . "common/html/toaster.html");
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