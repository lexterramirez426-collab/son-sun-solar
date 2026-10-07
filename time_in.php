<?php

date_default_timezone_set("Asia/Manila");

session_start();

require_once "db.php";


/* Check if user is logged in */

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}


/* Get employee ID */

$employee_id = $_SESSION["employee_id"];


/* Get coordinates */

$latitude = $_POST["latitude"] ?? null;
$longitude = $_POST["longitude"] ?? null;


/* Check if coordinates were received */

if ($latitude === null || $longitude === null) {
    die("Location is required for Time In.");
}


/* Get current date and time */

$time_in = date("Y-m-d H:i:s");

/* Check if employee already timed in today */

$today = date("Y-m-d");

$check = $conn->prepare(
    "SELECT attendance_id
     FROM attendance
     WHERE employee_id = ?
     AND DATE(time_in) = ?"
);

$check->bind_param(
    "is",
    $employee_id,
    $today
);

$check->execute();

$result = $check->get_result();

if ($result->num_rows > 0) {
    die("You have already timed in today.");
}


/* Save attendance */

$stmt = $conn->prepare(
    "INSERT INTO attendance
    (employee_id, time_in, latitude, longitude)
    VALUES (?, ?, ?, ?)"
);

$stmt->bind_param(
    "isdd",
    $employee_id,
    $time_in,
    $latitude,
    $longitude
);


if (!$stmt->execute()) {
    die("Failed to record Time In.");
}


/* Success */

header("Location: dashboard.php?time_in=success");
exit;

?>