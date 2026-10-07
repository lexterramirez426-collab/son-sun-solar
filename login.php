<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Son Sun Solar - Login</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>Son Sun Solar</h1>

    <h2>Employee Login</h2>

    <?php if (isset($_GET["registered"]) && $_GET["registered"] === "success"): ?>

   <p class="message">
    Registration successful! You can now log in.
</p>

<?php endif; ?>

<?php if (isset($_GET["error"]) && $_GET["error"] === "invalid"): ?>

    <p class="message">
    Invalid username or password.
</p>

<?php endif; ?>

    <form action="login_process.php" method="POST">

        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>

    </form>

</div>

</body>

</html>