<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$time_in_success = isset($_GET["time_in"]) &&
                   $_GET["time_in"] === "success";

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Son Sun Solar - Dashboard</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>Son Sun Solar</h1>

    <h2>Employee Dashboard</h2>


    <?php if ($time_in_success): ?>

        <p>
            Time In successful!
        </p>

    <?php endif; ?>


    <p>
        Welcome,
        <?php echo htmlspecialchars($_SESSION["username"]); ?>!
    </p>


    <p>
        Role:
        <?php echo htmlspecialchars($_SESSION["role"]); ?>
    </p>


    <?php if ($_SESSION["role"] === "Admin"): ?>

        <hr>

        <h3>Admin Panel</h3>

        <p>
            You are logged in as an Administrator.
        </p>

        <a href="admin_attendance.php">
            View All Attendance
        </a>

        <br><br>

        <a href="admin_employees.php">
            View Employees
        </a>

    <?php endif; ?>


    <p>
        Employee ID:
        <?php echo htmlspecialchars($_SESSION["employee_id"]); ?>
    </p>


    <form
        action="time_in.php"
        method="POST"
        id="timeInForm"
    >

        <input
            type="hidden"
            name="latitude"
            id="latitude"
        >

        <input
            type="hidden"
            name="longitude"
            id="longitude"
        >

        <button
    type="button"
    id="timeInButton"
    onclick="getLocation()"
>
    Time In
</button>

<p id="locationStatus"></p>

    </form>


    <br>


    <a href="attendance.php">
        View Attendance History
    </a>


    <script>

       function getLocation() {

    document.getElementById("timeInButton").disabled = true;
    document.getElementById("timeInButton").innerText = "Getting location...";
    document.getElementById("locationStatus").innerText = "Please allow location access.";

    if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(

                    function(position) {

                        document.getElementById("latitude").value =
                            position.coords.latitude;

                        document.getElementById("longitude").value =
                            position.coords.longitude;

                        document.getElementById("timeInForm").submit();

                    },

                    function(error) {

    document.getElementById("timeInButton").disabled = false;
    document.getElementById("timeInButton").innerText = "Time In";
    document.getElementById("locationStatus").innerText = "";

    alert(
        "Location permission is required for Time In."
    );

},

                );

            } else {

                alert(
                    "Geolocation is not supported by this browser."
                );

            }

        }

    </script>


    <br><br>


    <a href="logout.php">
        Logout
    </a>

</div>

</body>

</html>