<?php

require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid request.");
}


/* Get form data */

$fname = trim($_POST["fname"]);
$mname = trim($_POST["mname"]);
$lname = trim($_POST["lname"]);
$birthday = $_POST["birthday"];
$gender = $_POST["gender"];
$email = trim($_POST["email"]);
$phone_number = trim($_POST["phone_number"]);
$address = trim($_POST["address"]);
$department = trim($_POST["department"]);
$username = trim($_POST["username"]);
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];


/* Required field validation */

if (
    empty($fname) ||
    empty($mname) ||
    empty($lname) ||
    empty($birthday) ||
    empty($gender) ||
    empty($email) ||
    empty($phone_number) ||
    empty($address) ||
    empty($department) ||
    empty($username) ||
    empty($password) ||
    empty($confirm_password)
) {
    die("All fields are required.");
}


/* Email validation */

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}


/* Password confirmation */

if ($password !== $confirm_password) {
    die("Passwords do not match.");
}


/* Password length */

if (strlen($password) < 8) {
    die("Password must be at least 8 characters.");
}


/* Check if username already exists */

$check_username = $conn->prepare(
    "SELECT user_id FROM users WHERE username = ?"
);

$check_username->bind_param("s", $username);

$check_username->execute();

$result = $check_username->get_result();

if ($result->num_rows > 0) {
    die("Username already exists.");
}


/* Check if email already exists */

$check_email = $conn->prepare(
    "SELECT employee_id FROM employees WHERE email = ?"
);

$check_email->bind_param("s", $email);

$check_email->execute();

$email_result = $check_email->get_result();

if ($email_result->num_rows > 0) {
    die("Email address already exists.");
}


/* Save employee information */

$stmt = $conn->prepare(
    "INSERT INTO employees
    (fname, mname, lname, birthday, gender, email, phone_number, address, department)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
);

$stmt->bind_param(
    "sssssssss",
    $fname,
    $mname,
    $lname,
    $birthday,
    $gender,
    $email,
    $phone_number,
    $address,
    $department
);

if (!$stmt->execute()) {
    die("Failed to save employee information.");
}


/* Get the new employee ID */

$employee_id = $conn->insert_id;


/* Hash the password */

$hashed_password = password_hash(
    $password,
    PASSWORD_DEFAULT
);


/* Save user account */

$user = $conn->prepare(
    "INSERT INTO users
    (employee_id, username, password, role)
    VALUES (?, ?, ?, 'Employee')"
);

$user->bind_param(
    "iss",
    $employee_id,
    $username,
    $hashed_password
);

if (!$user->execute()) {
    die("Employee saved, but account creation failed.");
}


/* Success */

header("Location: login.php?registered=success");
exit;

?>