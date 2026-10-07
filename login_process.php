<?php

session_start();

require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid request.");
}


/* Get form data */

$username = trim($_POST["username"]);
$password = $_POST["password"];


/* Required field validation */

if (empty($username) || empty($password)) {
    die("Username and password are required.");
}


/* Find user */

$stmt = $conn->prepare(
    "SELECT user_id, employee_id, username, password, role
     FROM users
     WHERE username = ?"
);

$stmt->bind_param("s", $username);

$stmt->execute();

$result = $stmt->get_result();


/* Check if username exists */

if ($result->num_rows === 0) {
    header("Location: login.php?error=invalid");
    exit;
}


$user = $result->fetch_assoc();


/* Verify password */

if (!password_verify($password, $user["password"])) {
    header("Location: login.php?error=invalid");
    exit;
}

/* Create login session */

$_SESSION["user_id"] = $user["user_id"];
$_SESSION["employee_id"] = $user["employee_id"];
$_SESSION["username"] = $user["username"];
$_SESSION["role"] = $user["role"];


/* Login successful */

header("Location: dashboard.php");
exit;

?>