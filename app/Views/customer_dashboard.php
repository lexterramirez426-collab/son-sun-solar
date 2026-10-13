
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard | Son Sun Solar</title>
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
            gap: 15px;
            flex-wrap: wrap;
            box-shadow: 0 2px 10px #0000000d;
        }

        .logo { font-size: 22px; font-weight: bold; }

        a { color: #174d37; }

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

        .welcome, .service {
            background: white;
            padding: 28px;
            border-radius: 14px;
            margin-bottom: 20px;
            box-shadow: 0 5px 20px #00000008;
        }

        h1 { margin-top: 0; }
        .service h2 { color: #f97316; }
    </style>
</head>
<body>

<header>
    <div class="logo">☀ SON SUN SOLAR</div>
    <a class="logout" href="<?= site_url('customer/logout') ?>">Log Out</a>
</header>

<main>
    <section class="welcome">
        <h1>Welcome, <?= esc(session()->get('customer_name')) ?>!</h1>
        <p>You are now logged in to your Son Sun Solar customer account.</p>
        <p><strong>Email:</strong>
            <?= esc(session()->get('customer_email')) ?>
        </p>
    </section>

    <section class="service">
        <h2>Our Solar Services</h2>
        <p>Explore the services available to help you get started with solar energy.</p>
        <ul>
            <li>Solar Consultation</li>
            <li>Solar Panel Installation</li>
            <li>Solar Panel Maintenance</li>
        </ul>
        <p>Interested in solar energy?
            <a href="<?= site_url('/') ?>#contact">Contact our team</a>.
        </p>
    </section>
</main>

</body>
</html>
