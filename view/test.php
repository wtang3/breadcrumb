<?php

//////////////
// includes //
//////////////

include '../controller/include.php';


///////////////////////////////
// files to pass into head() //
///////////////////////////////

$css = ["test.css","test2.css"];
$meta =[];
$scripts = [];
$ico = [];
$title ="blah";


////////////////////
// Content begins //
/////////////////////////////////////////////////////////////////
// Pass in css,meta,scripts,ico paths inside head. If no value //
// pass in NULL for all.                                       //
/////////////////////////////////////////////////////////////////

//head($css,$meta,$scripts,$ico,$title);
head(NULL,NULL,NULL,NULL,NULL);
breadcrumb("!home");
navigation(__DIR__);


tail();

//////////////////
// Content ends //
//////////////////
?>