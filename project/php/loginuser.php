<?php
require_once __DIR__ . "./config.php";

if (empty($_POST["name_us"])) {
    die("Name is required");
}

if (!filter_var($_POST["emauil_us"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["pass_us"]) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["pass_us"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["pass_us"])) {
    die("Password must contain at least one number");
}

if ($_POST['password'] !== $_POST['conf_pass_us']) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST['pass_us'], PASSWORD_DEFAULT);

$sql = "INSERT INTO `users`(`id`, `name`, `email`, `password`) VALUES ('?','?','?','?')";

$stmt = $mysqli->prepare($sql);

if (!$stmt) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss", $_POST['name_us'], $_POST['emauil_us'], $password_hash);

if ($stmt->execute()) {
    header("Location: signup-success.html");
    exit;
} else {
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}

$stmt->close();
$mysqli->close();
?>