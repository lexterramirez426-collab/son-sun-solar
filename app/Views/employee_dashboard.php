
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard | Son Sun Solar</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff7ed;
            color: #174d37;
        }

        header {
            background: white;
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            box-shadow: 0 2px 10px #0000000d;
        }

        .logo { font-size: 22px; font-weight: bold; }

        .logout {
            background: #f97316;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 6px;
        }

        main {
            max-width: 900px;
            margin: 45px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 28px;
            border-radius: 14px;
            margin-bottom: 20px;
            box-shadow: 0 5px 20px #00000008;
        }

        h1 { margin-top: 0; }
        h2 { color: #f97316; }

        .role {
            display: inline-block;
            background: #dcfce7;
            color: #166534;
            padding: 7px 12px;
            border-radius: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>
<header>
    <div class="logo">☀ SON SUN SOLAR</div>
    <a class="logout" href="<?= site_url('employee/logout') ?>">Log Out</a>
</header>

<main>
    <section class="card">
        <h1>Welcome, <?= esc(session()->get('employee_username')) ?>!</h1>
        <p>You are logged in to the Son Sun Solar employee portal.</p>
        <p>Your role:
            <span class="role">
                <?= esc(session()->get('employee_role')) ?>
            </span>
        </p>
    </section>

    <section class="card">
        <h2>Employee Portal</h2>
        <p>Welcome to your employee dashboard.</p>
        <p>For account access or assistance, please contact your HR department or administrator.</p>
    </section>
</main>
</body>
</html>
