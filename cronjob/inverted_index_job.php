<?php

use DOM\HTMLDocument;

$file_root = "../";

$files = array("quotes.html", 
               "notesfromtheundergroundp1.html", 
               "notesfromtheundergroundp2.html",
               "notesfromtheundergroundp3.html",
               "notesfromtheundergroundp4.html");

$files_content_hashMap = [];

foreach($files as $file) {
    $dom = HTMLDocument::createFromFile(realpath($file_root . $file));
  
    $body_text = $dom->getElementsByTagName('body')->item(0)->textContent;

    foreach(explode(" ", $body_text) as $term) {

      echo $term;
      
      if(array_key_exists($term, $files_content_hashMap)
         $files_content_hashMap[$term] = 1;
      else
        $files_content_hashMap[$term]++;
      
    }
}

var_dump($files_content_hashMap);

?>
