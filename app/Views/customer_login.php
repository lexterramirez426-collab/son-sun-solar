
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login | Son Sun Solar</title>
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            font-family: Arial, sans-serif;
            background: #fff7ed;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            padding: 35px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0,0,0,.10);
        }

        .logo {
            text-align: center;
            color: #174d37;
            font-size: 23px;
            font-weight: bold;
        }

        h2 {
            text-align: center;
            color: #174d37;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin: 15px 0 7px;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 7px;
            font-size: 15px;
        }

        button {
            width: 100%;
            margin-top: 22px;
            padding: 13px;
            border: none;
            border-radius: 7px;
            background: #f97316;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover { background: #ea580c; }

        .message {
            padding: 10px;
            border-radius: 6px;
            margin: 15px 0;
            background: #fee2e2;
            color: #991b1b;
        }

        .links {
            margin-top: 20px;
            text-align: center;
            line-height: 2;
        }

        a { color: #174d37; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="logo">☀ SON SUN SOLAR</div>

        <h2>Customer Login</h2>
        <p class="subtitle">Welcome back! Log in to your account.</p>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="message">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('customer/authenticate') ?>" method="post">
            <?= csrf_field() ?>

            <label for="email">Email Address</label>
            <input
                type="email"
                id="email"
                name="email"
                value="<?= esc(old('email') ?? '') ?>"
                placeholder="Enter your email"
                required
            >

            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Enter your password"
                required
            >

            <button type="submit">Log In</button>
        </form>

        <div class="links">
            <p>Don't have an account?
                <a href="<?= site_url('customer/register') ?>">Register here</a>
            </p>
            <a href="<?= site_url('/') ?>">← Back to Home</a>
        </div>
    </div>
</body>
</html>
