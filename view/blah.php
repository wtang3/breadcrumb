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

/*
$values = [4,1,100,24,5,1,6];
function bubble($values){
  for($i = 1; $i<=count($values);$i++){
    for($j = 1; $j<=count($values)-$i;$j++){
      if($values[$j-1] > $values[$j]){
        $temp = $values[$j];
        $values[$j]=$values[$j-1];
        $values[$j-1]=$temp;
      }
    }
  }
  print "<br>";
  print "Bubble Sort: ";
  foreach ($values as $a) {
    print $a . "\n";
  }
}

function insertionsort($values){

}

bubble($values);
*/

tail();

//////////////////
// Content ends //
//////////////////
?>