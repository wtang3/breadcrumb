<?php

##################
## breadcrumb() ##
######################################################
# Function takes in 2 parameters. First parameter is #
# either "home" or "!home" stating if it is the home #
# directory. Second parameter is how many levels to  #
# traverse back to home.                             #
######################################################

function breadcrumb($input = NULL){
  // Configuration variables
  $delimeter =">";
  //note to specify 1 path above the current path you want
  //to specify as home.
  $pathToHome ="view";
  ////////////////////////////////////////////////
  // Do not touch below
  ////////////////////////////////////////////////
  $dot ="";
  $SPACE = "     ";
  $input = strtolower($input);
  $depthOfHome = 0;
  $levels = 0;
  $pos = strpos($_SERVER["PHP_SELF"],"index.php");
  $flag = 1;

    // Error if function is not used correctly.
  $fullPath = explode("/",$_SERVER["REQUEST_URI"]);

  for($i =0;$i<count($fullPath)-1;$i++){
    if($pathToHome === $fullPath[$i]){
      $depthOfHome = $i;
    }
  }
 
  for($i=$depthOfHome;$i<count($fullPath)-2;$i++){
    $levels++;
  }
  
  if($input == NULL){
    print "[Error]: Valid Directions -> breadcrumb takes in 1 parameters.\r\n";
    print "<br>";
    print "         breadcrumb(\"home\" || \"!home\")";
    print "<br>";
    print "         breadcrumb(!optional)";
    print "** Note Delimeter is defined in the breadcrumb function.";
  }else{
    // If defined as home directory.
    if($input == "home"){
      print "    <a href = \".\">Home</a>\n";
    // If it is not a home directory.
    }else if($input == "!home"){
      //Store the full path of file into slashes.
      $slashes = $_SERVER["REQUEST_URI"];
      //count the number of slashes in path.
      $slashCount = strlen($slashes)-(strlen(str_replace('/','',$slashes)));
      //levels is passed in and subtracted from slash count.
      $count = $slashCount-$levels;
      // Remove the "/" from the path
      $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
      // remove the extensions.
      $crumbs = str_replace(".php","", $crumbs);
      for($i=0;$i<$levels;$i++){
        $dot .= "../"; 
      }
      
      // Home links if 0 meaning that it is the same level as home.
      if($levels == 0 && $input =="!home"){
        print "    <a href =\"index.php\">Home</a>\n";
        print $SPACE . $delimeter;
        print " ". $crumbs[count($crumbs)-1];
      }else if($levels == 1 && $input =="!home"  && $pos === false){
        print "    <a href =\"$dot\">Home</a>\n";
        print $SPACE . $delimeter;
        if($crumbs[count($crumbs)-2] !== $pathToHome){
          print " <a href=\".\"> ". $crumbs[count($crumbs)-2] . "</a> ". $delimeter;
        }
        print " ". $crumbs[count($crumbs)-1];
        // toggles flag
        $flag = 0; 
      }

      $sizeofcrumbs = count($crumbs);
      if($levels >1 && $pos === false){
        print "    <a href =\"$dot\">Home</a>\n";
        print " " . $delimeter . " ";
        for($i=1;$i<$sizeofcrumbs-1; $i++){
          if($crumbs[$i] != "index" && $crumbs[$i] != $pathToHome){
            print " <a href=\"".cd($i,$sizeofcrumbs)."\">" . $crumbs[$i] ."</a>" ." ". $delimeter;
          }
        }
        print " ". $crumbs[count($crumbs)-1]; 
      }else if($levels >= 1 && $pos !== true && $flag == 1){
        print "    <a href =\"$dot\">Home</a>\n";
        for($i=1;$i<$sizeofcrumbs-1; $i++){
          if($crumbs[$i] != "index" && $crumbs[$i] != $pathToHome){
            print " " . $delimeter . " ". "<a href=\"".cd($i,$sizeofcrumbs)."\">" . $crumbs[$i] ."</a>";
          }
        }
      }
    }
  }
}
#~~~~~~~~~~~~~~~~~~~~~#
#~ breadcrumb() ends ~#
#~~~~~~~~~~~~~~~~~~~~~#

###########
## nav() ##
#######################################################
# nav takes default 2 parameters, 1st one is the path #
# of the file which is a simple __DIR__. And the 2nd  #
# param takes a display param which could either be   #
# "" for horizontal or "v" for vertical.              #
#######################################################

function navigation($filepath,$display=NULL){
  $i=0;
  $currentFile = $_SERVER["PHP_SELF"];
  $currentFile = explode("/", $currentFile);
  $size = count($currentFile);
  $file = opendir($filepath);
  // space just to make html look prettier.
  $SPACE = "    ";
  while(false !== ($entry = readdir($file))){
    $nav[$i] = $entry;
    $i++;
  }
  print "\n$SPACE</br>\n";
  // matching numbers upper/lowercases in the filename. if the pregmatch is not
  // there it will not display the paths. second logic is to remove the current file
  // that is open from the nav. Also not displaying index.php
  if($display==""){
    foreach($nav as $n){
      if(preg_match('/[A-Z]|[a-z]|[0-9]+/', $n) && $n != $currentFile[$size-1] && $n !="index.php"){
        print $SPACE."<a href = \"$n\">".$n=str_replace(".php","", $n)."</a>\n";
      }
    }
  }else if($display == "v"){
     foreach($nav as $n){
      if(preg_match('/[A-Z]|[a-z]|[0-9]+/', $n) && $n != $currentFile[$size-1] && $n !="index.php"){
        print $SPACE."<a href = \"$n\">".$n=str_replace(".php","", $n)."</a>\n";
        print "\n<br>\n";
      }
    }
  }
}
#~~~~~~~~~~~~~~#
#~ nav() ends ~#
#~~~~~~~~~~~~~~#

##########
## cd() ##
##################################################################
# function cd takes 2 params size and size of crumb or directory #
# the function will determine how many levels to cd back down    #
##################################################################
function cd($size,$sizeofcrumbs){
 $link ="";
 $cdSize = (($sizeofcrumbs)-1)-$size;
 for($i =1; $i<$cdSize; $i++){
  $link .="../";
 }
 if($cdSize == 1){
  return ".";
 }
 return $link;
}
#~~~~~~~~~~~~~#
#~ cd() ends ~#
#~~~~~~~~~~~~~#

?>