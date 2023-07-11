<?php
  session_start();
?>
<?php

// Set the content type to CSV
header('Content-Type: text/csv');

// Set the file name
header('Content-Disposition: attachment; filename="data.csv"');

// Open a file pointer to write the CSV data
$fh = fopen('php://output', 'w');

$serialized_array = $_POST['array'];
$array = unserialize($serialized_array);

function array_to_csv($array){
  $csv_string = implode(";",$array);
  return $csv_string;
}
echo array_to_csv($array);
fclose($fh);

?>
