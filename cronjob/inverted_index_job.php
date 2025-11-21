<?php

use DOM\HTMLDocument;

$file_root = "../";

$files = array("quotes.html", 
               "notesfromtheundergroundp1.html", 
               "notesfromtheundergroundp2.html",
               "notesfromtheundergroundp3.html",
               "notesfromtheundergroundp4.html");

$files_content_hashMap = array();

foreach($files as $file) {
    $dom = HTMLDocument::createFromFile(realpath($file_root . $file));
  
    $body_text = $dom->getElementsByTagName('body')->item(0)->textContent;

    $body_terms = explode(" ", $body_text);

    $unique_body_terms = array_unique($body_terms);

    foreach($unique_body_terms as $term) {
      if (!array_key_exists($term, $files_content_hashMap))
        $files_content_hashMap[$term] = array($file);
       else
        array_push($files_content_hashMap[$term], $file);
    }
}

$json_content = json_encode($files_content_hashMap, JSON_PRETTY_PRINT);

echo $json_content;

?>
