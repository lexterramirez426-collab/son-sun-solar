<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Son Sun Solar - Registration</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>Son Sun Solar</h1>

    <h2>Employee Registration</h2>

   <form action="register_process.php" method="POST">

        <label>First Name</label>
        <input type="text" name="fname" required>

        <br><br>

        <label>Middle Name</label>
        <input type="text" name="mname" required>

        <br><br>

        <label>Last Name</label>
        <input type="text" name="lname" required>

        <br><br>

        <label>Birthday</label>
        <input type="date" name="birthday" required>

        <br><br>

        <label>Gender</label>

        <select name="gender" required>

            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>

        </select>

        <br><br>

        <label>Email</label>
        <input type="email" name="email" required>

        <br><br>

        <label>Phone Number</label>
        <input type="text" name="phone_number" required>

        <br><br>

        <label>Address</label>
        <textarea name="address" required></textarea>

        <br><br>

        <label>Department</label>
        <input type="text" name="department" required>

        <br><br>

        <label>Username</label>
        <input type="text" name="username" required>

        <br><br>

        <label>Password</label>
        <input type="password" name="password" required>

        <br><br>

        <label>Confirm Password</label>
        <input type="password" name="confirm_password" required>

        <br><br>

        <button type="submit">Register</button>

        </form>

</div>

</body>

</html>