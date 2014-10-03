<?php

ini_set('auto_detect_line_endings', TRUE);


$rows = array_map('str_getcsv', file('variablelist2.csv'));
$header = array_shift($rows);
$var = array();
foreach ($rows as $row) {
  $var[] = array_combine($header, $row);
}
print_r($var);

class arrays {
    
    public function csv_to_array($filename='', $delimiter=',') {
        if(!file_exists($filename) || !is_readable($filename))
            return FALSE;

        $header = NULL;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
                if(!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }
        return $data;
    }
}

$universities = new arrays;
print_r ($universities->csv_to_array('universities.csv'));


?>