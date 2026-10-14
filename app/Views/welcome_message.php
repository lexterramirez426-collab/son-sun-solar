
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Son Sun Solar | Power Your Future</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: Arial, sans-serif;
            color: #18332b;
            line-height: 1.6;
            background: #fffdf8;
        }

        header {
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            background: white;
            border-bottom: 1px solid #f2eadf;
        }

        .logo {
            font-size: 24px;
            font-weight: 800;
            color: #174d37;
        }

        .logo span { color: #f97316; }

        nav {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 22px;
        }

        nav a {
            text-decoration: none;
            color: #18332b;
            font-size: 14px;
            font-weight: 700;
        }

        nav a:hover { color: #f97316; }

        .btn {
            display: inline-block;
            background: #f97316;
            color: white;
            padding: 13px 22px;
            border-radius: 7px;
            text-decoration: none;
            font-weight: bold;
            transition: background .2s;
        }

        .btn:hover { background: #dd5d08; }

        .hero {
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            align-items: center;
            gap: 35px;
            padding: 75px 7%;
            background: linear-gradient(120deg, #fff7ed, #fffdf5);
            overflow: hidden;
        }

        .hero-copy { max-width: 600px; }

        .eyebrow {
            color: #a64a0a;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .hero h1 {
            font-size: clamp(40px, 5vw, 68px);
            line-height: 1.02;
            letter-spacing: -2px;
            margin: 18px 0;
            color: #18332b;
        }

        .hero h1 span { color: #f97316; }

        .hero-copy > p:not(.eyebrow) {
            color: #52645b;
            margin-bottom: 26px;
            max-width: 480px;
        }

        .hero-image {
            position: relative;
        }

        .hero-image img {
            display: block;
            width: 100%;
            height: 440px;
            object-fit: cover;
            border-radius: 18px;
            box-shadow: 0 18px 45px rgba(70, 48, 20, .15);
        }

        .image-label {
            position: absolute;
            left: -18px;
            bottom: 22px;
            padding: 16px 20px;
            background: #f97316;
            color: white;
            border-radius: 8px;
            font-weight: bold;
            box-shadow: 0 8px 22px rgba(70, 48, 20, .15);
        }

        .hero-points {
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
            margin-top: 30px;
            font-size: 12px;
            font-weight: bold;
            color: #174d37;
        }

        .hero-points span::before {
            content: "☀ ";
            color: #f97316;
        }

        .consultation {
            background: #174d37;
            color: white;
            padding: 24px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .consultation h2 {
            font-size: clamp(18px, 2.3vw, 26px);
        }

        section.content-section { padding: 70px 7%; }

        .section-kicker {
            color: #d65c0b;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        h2.section-title {
            font-size: clamp(28px, 4vw, 42px);
            line-height: 1.2;
            margin-bottom: 15px;
        }

        .intro {
            max-width: 720px;
            color: #607067;
            margin-bottom: 28px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .card {
            border: 1px solid #f0e6d8;
            border-radius: 13px;
            padding: 27px;
            background: white;
            box-shadow: 0 8px 24px rgba(45, 40, 25, .035);
        }

        .card-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 54px;
    height: 54px;
    margin-bottom: 16px;
    border-radius: 50%;
    background: #fff0cf;
    color: #f97316;
    font-size: 27px;
}

        .card h3 {
            margin-bottom: 10px;
            color: #174d37;
        }

        .card p { color: #607067; }

        .services-section { background: #f8f7ef; }

        .contact-section {
            background: #fff1dc;
            text-align: center;
        }

        .contact-section p {
            max-width: 620px;
            margin: 0 auto 25px;
            color: #52645b;
        }

        footer {
            background: #102d22;
            color: #e3eee7;
            padding: 35px 7%;
        }

        footer p { margin-top: 7px; font-size: 14px; }

        @media (max-width: 850px) {
            .hero {
                grid-template-columns: 1fr;
                padding: 55px 7%;
            }

            .hero-image img { height: 350px; }

            .cards { grid-template-columns: 1fr 1fr; }
        }

        @media (max-width: 560px) {
            header { align-items: flex-start; }
            nav { gap: 12px; }
            nav a { font-size: 12px; }
            .hero h1 { letter-spacing: -1px; }
            .hero-image img { height: 270px; }
            .image-label { left: 10px; bottom: 10px; }
            .cards { grid-template-columns: 1fr; }
            .consultation { align-items: flex-start; }
        }
    </style>
</head>

<body>
<header>
    <div class="logo">☀ SON SUN <span>SOLAR</span></div>

    

<nav>
    <a href="<?= site_url('/') ?>">Home</a>
    <a href="<?= site_url('/') ?>#about">About</a>
    <a href="<?= site_url('/') ?>#services">Services</a>
    <a href="<?= site_url('/') ?>#contact">Contact</a>
    <a href="<?= site_url('customer/register') ?>">Customer Register</a>
    <a href="<?= site_url('customer/login') ?>">Customer Login</a>
    <a class="btn" href="<?= site_url('employee/login') ?>">Employee Login →</a>
</nav>


</header>

<main>
    <section class="hero">
        <div class="hero-copy">
            <p class="eyebrow">CLEAN ENERGY. BRIGHTER TOMORROW.</p>

            <h1>POWER YOUR FUTURE WITH <span>SOLAR.</span></h1>

            <p>
                Make the switch to clean, renewable energy.
                Explore solar solutions that can help lower electricity
                costs and support a more sustainable future.
            </p>

            <a class="btn" href="#contact">DISCOVER SOLAR →</a>

            <div class="hero-points">
                <span>Cleaner environment</span>
                <span>Energy savings</span>
                <span>Brighter tomorrow</span>
            </div>
        </div>

        <div class="hero-image">
            <img
                src="<?= base_url('images/download.jpg') ?>"
                alt="Solar panels installed on a rooftop"
            >
            <div class="image-label">☀ Clean Energy for Tomorrow</div>
        </div>
    </section>

    <div class="consultation">
        <h2>REQUEST YOUR FREE SOLAR CONSULTATION</h2>
        <a class="btn" href="#contact">CONTACT US →</a>
    </div>

    <section class="content-section" id="about">
        <p class="section-kicker">WHY CHOOSE SON SUN SOLAR</p>
        <h2 class="section-title">
            Energize your life. <span style="color:#f97316">Preserve our planet.</span>
        </h2>
        <p class="intro">
            We help homes and businesses explore solar solutions
            designed for a cleaner, more energy-conscious future.
        </p>

        <div class="cards">
            <div class="card">
                <div class="card-icon">☀️</div>
                <h3>Save on Energy</h3>
                <p>Explore options that may help reduce your reliance on grid electricity.</p>
            </div>

            <div class="card">
                <div class="card-icon">🌱</div>
                <h3>Live Sustainably</h3>
                <p>Choose renewable energy and take a step toward a cleaner environment.</p>
            </div>

            <div class="card">
                <div class="card-icon">⌂</div>
                <h3>Energy Independence</h3>
                <p>Discover solar solutions tailored to your property's energy needs.</p>
            </div>
        </div>
    </section>

    <section class="content-section services-section" id="services">
        <p class="section-kicker">WHAT WE OFFER</p>
        <h2 class="section-title">Solar services for every step</h2>
        <p class="intro">
            From your first questions to long-term system care,
            explore services to support your solar journey.
        </p>

        <div class="cards">
            <div class="card">
                <div class="card-icon">☀</div>
                <h3>Consultation</h3>
                <p>Discuss your energy needs and explore available solar options.</p>
            </div>

            <div class="card">
                <div class="card-icon">⌂</div>
                <h3>Installation</h3>
                <p>Plan your installation based on your property and project requirements.</p>
            </div>

            <div class="card">
                <div class="card-icon">⚙</div>
                <h3>Maintenance</h3>
                <p>Learn about ongoing care to help keep your solar system working well.</p>
            </div>
        </div>
    </section>

    <section class="content-section contact-section" id="contact">
        <p class="section-kicker">LET'S TALK SOLAR</p>
        <h2 class="section-title">Ready to make the switch?</h2>
        <p>
            Contact Son Sun Solar to ask about our services
            or request a solar consultation for your home or business.
        </p>
        <a class="btn" href="mailto:sol.solis@sunsonsolar.com">REACH OUT TO US →</a>
    </section>
</main>

<footer>
    <strong>☀ SON SUN SOLAR</strong>
    <p>Powering a brighter, more sustainable future.</p>
    <p>Contact: 09291230983</p>
    <p>Email: sol.solis@sunsonsolar.com</p>
    <p>© <?= date('Y') ?> Son Sun Solar. All rights reserved.</p>
</footer>
</body>
</html>
