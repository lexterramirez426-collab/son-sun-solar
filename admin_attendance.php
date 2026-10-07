<?php

session_start();

require_once "db.php";


/* Check if user is logged in */

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}


/* Check if user is Admin */

if ($_SESSION["role"] !== "Admin") {
    header("Location: dashboard.php");
    exit;
}


/* Get all attendance records */

$stmt = $conn->prepare(
    "SELECT
        attendance.attendance_id,
        employees.fname,
        employees.mname,
        employees.lname,
        attendance.time_in,
        attendance.latitude,
        attendance.longitude
     FROM attendance
     INNER JOIN employees
        ON attendance.employee_id = employees.employee_id
     ORDER BY attendance.time_in DESC"
);

$stmt->execute();

$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Son Sun Solar - Admin Attendance</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>Son Sun Solar</h1>

    <h2>Attendance Management</h2>

    <table>

        <tr>

            <th>Employee</th>
            <th>Date & Time</th>
            <th>Latitude</th>
            <th>Longitude</th>

        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>

            <tr>

                <td>
                    <?php
                    echo htmlspecialchars(
                        $row["fname"] . " " .
                        $row["mname"] . " " .
                        $row["lname"]
                    );
                    ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row["time_in"]); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row["latitude"]); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row["longitude"]); ?>
                </td>

            </tr>

        <?php endwhile; ?>

    </table>

    <br>

    <a href="dashboard.php">
        Back to Dashboard
    </a>

    <br><br>

    <a href="admin_employees.php">
         View Employees
    </a>

</div>

</body>

</html>