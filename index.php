<?php

class toArray{
    
    public function makeArray($file){
        $first_row = TRUE;
        $records = array();
        ini_set('auto_detect_line_endings',TRUE);
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($row = fgetcsv($handle, 4096, ",")) !== FALSE) {
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

    public function universities_link($universities_records){
        if(empty($_GET)) {
            $i = 1;
            foreach($universities_records as $universities_record) {
                staticLinks::html($universities_records, $i);
                $i++;
            }
        }
    }
}



class staticLinks{
    static public function html($universities_records, $i){
        $universities_record_num = $i - 1;
        $universities_records = $i - 1;
        echo '<a href=' . '"http://localhost/project218/index.php?school_record=' . $universities_record_num . '"' . '>University ' . $i . ' </a>';

        echo '</p>';
    }
}

?>