<?php
ini_set('auto_detect_line_endings',TRUE);

$file = fopen('universities.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  //$line is an array of the csv elements
  print_r($line);
}
fclose($file);

?>