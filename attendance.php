<?php

session_start();

require_once "db.php";


/* Check if user is logged in */

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}


/* Get employee ID */

$employee_id = $_SESSION["employee_id"];


/* Get attendance records */

$stmt = $conn->prepare(
    "SELECT attendance_id, time_in, latitude, longitude
     FROM attendance
     WHERE employee_id = ?
     ORDER BY time_in DESC"
);

$stmt->bind_param("i", $employee_id);

$stmt->execute();

$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Son Sun Solar - Attendance</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>Son Sun Solar</h1>

    <h2>Attendance History</h2>

    <table border="1" width="100%" cellpadding="10">

        <tr>
            <th>Date & Time</th>
            <th>Latitude</th>
            <th>Longitude</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>

            <tr>

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

    <a href="dashboard.php">Back to Dashboard</a>

</div>

</body>

</html>
