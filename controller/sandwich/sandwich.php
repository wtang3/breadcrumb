<?php

//////////////////
// sandwich.php //
/////////////////////////////////////////////
//This file produces the header and footer //
/////////////////////////////////////////////

  function head($css = NULL, 
                $meta = NULL, 
                $scripts = NULL, 
                $ico = NULL,
                $title = NULL){

    //print "<!DOCTYPE html PUBLIC '-//W3C//DTD HTML 4.01//EN\"\nhttp://www.w3.org/TR/html4/strict.dtd\">\n";
    print "<!DOCTYPE html>\n";
    print "<html>\n"; 
    print "  <head>\n";
    print "    <title>";
    print $title;
    print "</title>\n";
    if($meta != NULL){
      foreach($meta as $m){
        print "    ".$m ."\n";
      }
    }
    if($css != NULL){
      foreach($css as $c){
        print "    <link rel=\"stylesheet\" type=\"text/css\" href=\"$c\">\n";
      }
    }
    if($scripts != NULL){
      foreach($scripts as $s){
        print "    ".$s."\n";
      }
    }
    if($ico != NULL){
      foreach($ico as $icon){
        print "    <link rel=\"shortcut icon\" href=\"$icon\" type =\"image/x-icon\">\n";
      }
    }
    print "  </head>\n";
    print "  <body>\n";
  }




  function tail(){
    print "\n  </body>\n";
    print "</html>";
  }
?>