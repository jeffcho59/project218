<?php

class toArray{
    
    public function makeArray($file){
        $first_row = TRUE;
        $records = array();
        ini_set('auto_detect_line_endings',TRUE);
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($row = fgetcsv($handle, 5000, ",")) !== FALSE) {
                if($first_row == TRUE) {
                    $column_heading = $row;
                    $first_row = FALSE;
                } 
                else {
                    $record = array_combine($column_heading, $row);
                    $records[] = $record;
                }
            }
            fclose($handle);
        }
        
        return $records;
    }
    
    public function record($records){
        foreach($records as $record) {
            foreach($record as $key => $value) {
                echo $key . ': ' . $value .  "</br> \n";
            }
            echo '<hr>';
        }
    }
}
?>