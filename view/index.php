<?php

//////////////
// includes //
//////////////
include '../controller/include.php';

///////////////////////////////
// files to pass into head() //
///////////////////////////////

$css = ["daniel.css","a.css","b.css"];
$meta =["<meta http-equiv=\"X-UA-Compatible\" content=\"IE=8\"/>"
];
$scripts = ["<script src =\"a.js\"></script>"];
$ico = ["a.ico"];
$title ="title of this page";

////////////////////
// Content begins //
/////////////////////////////////////////////////////////////////
// Pass in css,meta,scripts,ico paths inside head. If no value //
// pass in NULL for all.                                       //
/////////////////////////////////////////////////////////////////

//head($css,$meta,$scripts,$ico,$title);
head(NULL,NULL,NULL,NULL,NULL);
breadcrumb("home");

navigation(__DIR__);


tail();

//////////////////
// Content ends //
//////////////////
?>