<?php
ini_set('display_errors', 'On');
ini_set('memory_limit','-1');
error_reporting(E_ALL | E_STRICT);

spl_autoload_register( function ($className) {
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
});

$main = new Classes\Models\csvarray();
$html = new Classes\Models\html();

$myrecords = $main->importcsv("variablelist.csv"); 
$schools = $main->importcsv("universities.csv"); 

$vals = $main->array_replace($myrecords, $schools, 'varname', 'varTitle');
$display = $main->school_link($vals);  
$table = $html->table($vals); 

?>