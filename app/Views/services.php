
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services | Son Sun Solar</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --primary: #205d35;
            --green: #287443;
            --background: #f8faf7;
            --soft-green: #eaf4e9;
            --text: #243128;
            --muted: #647067;
            --border: #e2e9e0;
            --white: #ffffff;
        }

        body {
            font-family: Arial, sans-serif;
            color: var(--text);
            background: var(--background);
            line-height: 1.6;
        }

        header {
            background: var(--white);
            padding: 18px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            border-bottom: 1px solid var(--border);
        }

        .logo {
            color: var(--green);
            font-size: 22px;
            font-weight: bold;
        }

        nav {
            display: flex;
            flex-wrap: wrap;
            gap: 22px;
        }

        nav a {
            color: var(--text);
            text-decoration: none;
            font-size: 14px;
            transition: color 0.2s ease;
        }

        nav a:hover,
        nav a.active {
            color: var(--green);
        }

        .hero {
            text-align: center;
            padding: 75px 20px 65px;
            background: var(--soft-green);
        }

        .eyebrow {
            display: inline-block;
            margin-bottom: 12px;
            color: var(--green);
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .hero h1 {
            font-size: clamp(32px, 4vw, 46px);
            line-height: 1.2;
            margin-bottom: 16px;
            color: var(--primary);
        }

        .hero p {
            max-width: 650px;
            margin: auto;
            color: var(--muted);
            font-size: 16px;
        }

        .services {
            max-width: 1100px;
            margin: auto;
            padding: 65px 24px 75px;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 38px;
        }

        .section-heading h2 {
            font-size: clamp(25px, 3vw, 30px);
            color: var(--text);
            margin-bottom: 10px;
        }

        .section-heading p {
            color: var(--muted);
        }

        .service-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }

        .service-card {
            background: var(--white);
            padding: 30px 26px;
            border: 1px solid var(--border);
            border-radius: 12px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(32, 93, 53, 0.09);
        }

        .service-number {
            display: inline-block;
            color: var(--green);
            background: var(--soft-green);
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
        }

        .service-card h3 {
            margin: 18px 0 12px;
            font-size: 21px;
            color: var(--primary);
        }

        .service-card p {
            color: var(--muted);
            font-size: 15px;
        }

        .cta {
            text-align: center;
            padding: 55px 20px;
            background: var(--primary);
            color: var(--white);
        }

        .cta h2 {
            font-size: clamp(24px, 3vw, 30px);
            margin-bottom: 12px;
        }

        .cta p {
            margin-bottom: 25px;
            color: #e4eee5;
        }

        .cta a {
            display: inline-block;
            background: var(--white);
            color: var(--primary);
            padding: 13px 25px;
            border: 1px solid var(--white);
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.2s ease;
        }

        .cta a:hover {
            background: var(--soft-green);
        }

        footer {
            padding: 25px 20px;
            text-align: center;
            color: var(--muted);
            background: var(--background);
            font-size: 14px;
        }

        @media (max-width: 760px) {
            header {
                padding: 18px 5%;
                justify-content: center;
            }

            nav {
                justify-content: center;
                gap: 15px;
            }

            .hero {
                padding: 55px 20px;
            }

            .services {
                padding: 45px 20px 55px;
            }

            .service-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">Son Sun Solar</div>
        <nav>
            <a href="<?= site_url('/') ?>">Home</a>
            <a href="<?= site_url('services') ?>" class="active">Services</a>
            <a href="<?= site_url('customer/login') ?>">Customer Login</a>
            <a href="<?= site_url('customer/register') ?>">Register</a>
        </nav>
    </header>

    <section class="hero">
        <span class="eyebrow">Clean Energy Solutions</span>
        <h1>Our Solar Services</h1>
        <p>Discover practical solar energy solutions designed to help you make the most of clean and renewable power.</p>
    </section>

    <main class="services">
        <div class="section-heading">
            <h2>How We Can Help</h2>
            <p>From planning your system to keeping it running efficiently, we are here to help.</p>
        </div>

        <div class="service-grid">
            <article class="service-card">
                <span class="service-number">SERVICE 01</span>
                <h3>Solar Consultation</h3>
                <p>Discuss your energy needs and explore suitable solar solutions for your home or business.</p>
            </article>

            <article class="service-card">
                <span class="service-number">SERVICE 02</span>
                <h3>Solar Installation</h3>
                <p>Plan your solar setup and get support for installing a system suited to your property's needs.</p>
            </article>

            <article class="service-card">
                <span class="service-number">SERVICE 03</span>
                <h3>Solar Maintenance</h3>
                <p>Keep your solar system in good condition through routine checks and maintenance support.</p>
            </article>
        </div>
    </main>

    <section class="cta">
        <h2>Ready to Explore Solar Energy?</h2>
        <p>Contact us to discuss your needs and request a free quotation.</p>
        <a href="<?= site_url('customer/register') ?>">Get Started</a>
    </section>

    <footer>
        <p>Son Sun Solar &copy; <?= date('Y') ?>. All rights reserved.</p>
    </footer>
</body>
</html>
