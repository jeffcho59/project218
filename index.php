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

    public function school_link($school_records){ 
        $r_name = array_column($school_records, 'INSTNM');
        if(empty($_GET)) {
            $i = 1;
            foreach($school_records as $school_record) {
                static_html::links($school_records, $i, $r_name);
                $i++;  
            }
        }
    }
}



class static_html{
  static public function links($school_records, $i, $r_name){ //link creation function
     $school_record_num = $i - 1;
     echo '<a href=' . '"http://localhost/project218/index.php?school_record=' . $school_record_num . '"' . '>' . $r_name[$i] . ' </a>';

     echo '</p>';
  }
  
    
  static public function table($vals){ 
       echo "<table border = 1 bordercolor= black cellspacing=0 cellpadding=5 style='font-size:14pt'>";
     echo "<tr>";


    foreach($vals as $key => $value){
        echo '<th>', $key, '</th>';
        echo '<td>', $value, '</td>';
        echo '</tr>';
      }

     echo '</table>';

   }    
    
}



$obj = new toArray;

$myrecords = $obj->makeArray("variablelist2.csv"); 
$schools = $obj->makeArray("universities.csv"); 

$display = $obj->school_link($schools);  
$school = $schools[$_GET['school_record']];

$vals= array_combine($myrecords, $schools); 

$table = static_html::table($vals)


?>
