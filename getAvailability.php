<?php
header('Content-Type: application/json');
$availabilityFile = 'availability.txt';

if (file_exists($availabilityFile)) {
    $data = file_get_contents($availabilityFile);
    echo $data;
} else {
    echo json_encode(array("error" => "File not found."));
}
?>
