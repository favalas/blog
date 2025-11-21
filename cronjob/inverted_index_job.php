<?php

use DOM\HTMLDocument;

$file_root = "../";

$files = array("quotes.html", 
               "notesfromtheundergroundp1.html", 
               "notesfromtheundergroundp2.html",
               "notesfromtheundergroundp3.html",
               "notesfromtheundergroundp4.html");

$total_files_content = "";

foreach($files as $file) {
    try {
    $dom = HTMLDocument::createFromFile(realpath($file_root . $file));
}
catch(\Error $e) {
  echo 'Message: ';
  exit();
}
  
    $body_text = $dom->getElementsByTagName('body')->item(0)->$textContent;

    $total_files_content .= $body_text;
}

echo $body_text;

?>
