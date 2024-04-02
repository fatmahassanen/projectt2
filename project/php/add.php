<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$eventName = $_POST['evetName'];
$date = $_POST['date'];
$score = $_POST['score'];
$evaluate = $_POST['evaluate'];
$sql = "INSERT INTO `events`(`event name`, `date`, `score`, `evaluate`) VALUES ('$eventName','$date','$score','$evaluate')" ;
if ($conn->query($sql) === TRUE) {
    header('Location: admin.html');
    exit;
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
    ?>
    