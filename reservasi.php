<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $roomType = htmlspecialchars($_POST["roomType"]);
    $checkinDate = htmlspecialchars($_POST["checkinDate"]);
    $checkoutDate = htmlspecialchars($_POST["checkoutDate"]);

    $data = "Name: $name, Email: $email, Room Type: $roomType, Check-in: $checkinDate, Check-out: $checkoutDate\n";
    file_put_contents("data_reservasi.txt", $data, FILE_APPEND);

    echo "Reservation successful!";
} else {
    echo "Invalid request method.";
}
?>
