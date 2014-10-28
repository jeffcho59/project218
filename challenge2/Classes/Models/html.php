<?php
namespace Classes\Models;

interface html_interface{
    public static function links($school_record, $i);
    public static function table($vals);
}

class Html implements html_interface{
    static public function links($school_record, $i){ 
	       $school_record_num = $i ;
            echo '<a href=' . '"http://web.njit.edu/~jc389/phpproject/challenge2/index.php?school_record=' . $school_record_num . '"' . '>' . $school_record['Institution (entity) name'] . '                    </a>';

        
            echo '</p>';
    }

    static public function table($vals){
       echo "<table border = 1 bordercolor= black cellspacing=0 cellpadding=5 style='font   -                   size:14pt'>";
        echo "<tr>";

	   $school = $vals[$_GET['school_record']];
  
        foreach($school as $key => $value){
            echo '<th>', $key, '</th>';
            echo '<td>', $value, '</td>';
            echo '</tr>';
        }

        echo '</table>';

    }
    
    

}



?>