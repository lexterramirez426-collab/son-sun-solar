
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration | Son Sun Solar</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff7ed;
            color: #18332b;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }
        .container {
            width: 100%;
            max-width: 480px;
            background: white;
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 12px 35px rgba(24, 51, 43, .10);
        }
        .logo { font-size: 22px; font-weight: bold; color: #174d37; }
        .logo span { color: #f97316; }
        h1 { margin: 24px 0 8px; font-size: 28px; }
        .subtitle { color: #647067; margin-bottom: 25px; }
        label { display: block; margin: 15px 0 6px; font-weight: bold; font-size: 14px; }
        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #d8dfd9;
            border-radius: 7px;
            font-size: 15px;
        }
        input:focus { outline: 2px solid #fed7aa; border-color: #f97316; }
        button {
            width: 100%;
            border: 0;
            border-radius: 7px;
            padding: 14px;
            margin-top: 24px;
            background: #f97316;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover { background: #dd5d08; }
        .message { padding: 12px; border-radius: 7px; margin-top: 15px; font-size: 14px; }
        .error { background: #fee2e2; color: #991b1b; }
        .success { background: #dcfce7; color: #166534; }
        .back { display: block; margin-top: 20px; text-align: center; color: #174d37; text-decoration: none; font-size: 14px; }
        .back:hover { text-decoration: underline; }
    </style>
</head>
<body>
<div class="container">
    <div class="logo">☀ SON SUN <span>SOLAR</span></div>
    <h1>Create your account</h1>
    <p class="subtitle">Register as a customer to get started with solar energy.</p>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="message error">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="message success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <?php $errors = session()->getFlashdata('errors') ?? []; ?>
    <?php if (!empty($errors)): ?>
        <div class="message error">
            <?php foreach ($errors as $error): ?>
                <div><?= esc($error) ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('customer/save') ?>" method="post">
        <?= csrf_field() ?>

        <label for="full_name">Full Name</label>
        <input id="full_name" type="text" name="full_name"
               value="<?= old('full_name') ?>" maxlength="150" required>

        <label for="email">Email Address</label>
        <input id="email" type="email" name="email"
               value="<?= old('email') ?>" maxlength="150" required>

        <label for="phone">Phone Number</label>
        <input id="phone" type="tel" name="phone"
               value="<?= old('phone') ?>" maxlength="20" required>

        <label for="password">Password (minimum 8 characters)</label>
        <input id="password" type="password" name="password"
               minlength="8" required>

        <button type="submit">Create Account</button>
    </form>

    <a class="back" href="<?= site_url('/') ?>">← Back to Son Sun Solar homepage</a>
</div>
</body>
</html>
