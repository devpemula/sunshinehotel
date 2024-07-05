<?php
header('Content-Type: application/json');
$availabilityFile = 'availability.txt';
$reservationFile = 'data_reservasi.txt';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $roomType = $_POST['roomType'];
    $checkinDate = $_POST['checkinDate'];
    $checkoutDate = $_POST['checkoutDate'];

    if (file_exists($availabilityFile)) {
        $data = json_decode(file_get_contents($availabilityFile), true);
        if (isset($data[$roomType]) && $data[$roomType] > 0) {
            $data[$roomType]--;

            // Update availability file
            file_put_contents($availabilityFile, json_encode($data));

            // Add reservation to reservation file
            $reservationData = array(
                'name' => $name,
                'email' => $email,
                'roomType' => $roomType,
                'checkinDate' => $checkinDate,
                'checkoutDate' => $checkoutDate
            );
            $reservationEntry = json_encode($reservationData) . PHP_EOL;
            file_put_contents($reservationFile, $reservationEntry, FILE_APPEND);

            echo json_encode(array("success" => "Room booked successfully."));
        } else {
            echo json_encode(array("error" => "No rooms available."));
        }
    } else {
        echo json_encode(array("error" => "File not found."));
    }
}
?>
