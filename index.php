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

    public function school_link($school_records){ //creates links
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
     echo '<a href=' . '"http://localhost/php218/proj1/college.php?school_record=' .               $school_record_num . '"' . '>' . $r_name[$i] . ' </a>';

     echo '</p>';
  }
  
    
  static public function table($vals){ //table creation function
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



$obj = new toArray; //create new object

$myrecords = $obj->makeArray("variablelist2.csv"); //import first csv into array
$schools = $obj->makeArray("universities.csv"); //import secont csv into seperate array

//$variables = array_column($myrecords, 'varTitle', 'varname' ); 
//take varTitle and varname out of dictionary

$display = $obj->school_link($schools); //creates links 
$school = $schools[$_GET['school_record']];

$vals= array_combine($myrecords, $school); //combines arrays into one
$table = static_html::table($vals)  //create table


?>
