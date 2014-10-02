<?php

ini_set('auto_detect_line_endings',TRUE);

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

    //print_r(csv_to_array('variablelist.csv'));
}

$variablelist = new arrays;
print_r ($variablelist->csv_to_array('variablelist.csv'));

$universities = new arrays;
print_r ($universities->csv_to_array('universities.csv'));

?>