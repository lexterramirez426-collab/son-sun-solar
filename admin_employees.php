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

/* Get all employees */

$stmt = $conn->prepare(
    "SELECT
        employee_id,
        fname,
        mname,
        lname,
        birthday,
        gender,
        email,
        phone_number,
        address,
        department
     FROM employees
     ORDER BY lname ASC"
);

$stmt->execute();

$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Son Sun Solar - Employees</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container wide-container">

    <h1>Son Sun Solar</h1>

    <h2>Employee List</h2>

    <div class="table-container">

    <table>

        <tr>

            <th>ID</th>
            <th>Name</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Department</th>

        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>

            <tr>

                <td>
                    <?php echo htmlspecialchars($row["employee_id"]); ?>
                </td>

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
                    <?php echo htmlspecialchars($row["birthday"]); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row["gender"]); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row["email"]); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row["phone_number"]); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row["department"]); ?>
                </td>

            </tr>

        <?php endwhile; ?>

    </table>

    <br>

    <a href="dashboard.php">
        Back to Dashboard
    </a>

    <br><br>

    <a href="admin_attendance.php">
     View All Attendance
    </a>

</table>

</div>

</body>

</html>