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

      $patterns = array();
      $patterns[0] = '/\n/';
      $patterns[1] = '/\./';
      $patterns[2] = '/\;/';
      $patterns[3] = '/\,/';
      $term_parsed = preg_replace($patterns, "", $term);
      
      if(empty($term_parsed))
        continue;
      
      if (!array_key_exists($term_parsed, $files_content_hashMap))
        $files_content_hashMap[$term_parsed] = array($file);
       else
        array_push($files_content_hashMap[$term_parsed], $file);
    }
}

$json_content = json_encode($files_content_hashMap, JSON_PRETTY_PRINT);

$filename = "inverted_index.json";

file_put_contents($filename, $json_content);

echo "Inverted index created and saved at: " . $filename;

?>
