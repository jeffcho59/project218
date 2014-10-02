<?php

ini_set('auto_detect_line_endings',TRUE);

$variablelist = fopen('variablelist.csv', 'r');
while (($line = fgetcsv($variablelist)) !== FALSE) {
    foreach($lines as $data) {
        list($variable[],$name[])=$line;
    }
    sort($line);
    print_r($line);
}
fclose($variablelist);


$universities = fopen('universities.csv', 'r');
while (($line = fgetcsv($universities)) !== FALSE) {
    foreach($lines as $data) {
        list($variable[],$name[])=$line;
    }
    sort($line);
    print_r($line);
}
fclose($file);

?>