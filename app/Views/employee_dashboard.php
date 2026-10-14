
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard | Son Sun Solar</title>
    <style>
        * {
            box-sizing: border-box;
        }

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

        .logo {
            font-size: 22px;
            font-weight: bold;
        }

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

        h1 {
            margin-top: 0;
        }

        h2 {
            color: #f97316;
        }

        .role {
            display: inline-block;
            background: #dcfce7;
            color: #166534;
            padding: 7px 12px;
            border-radius: 20px;
            font-weight: bold;
        }

        .attendance-status {
            display: inline-block;
            padding: 8px 13px;
            border-radius: 20px;
            background: #f3f4f6;
            color: #374151;
            font-weight: bold;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .attendance-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 20px;
        }

        .btn {
            border: none;
            border-radius: 7px;
            padding: 12px 20px;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .time-in {
            background: #15803d;
        }

        .time-out {
            background: #f97316;
        }

        .btn:disabled {
            background: #9ca3af;
            cursor: not-allowed;
        }

        .attendance-info {
            line-height: 1.8;
        }

        .portal-link {
            color: #15803d;
            font-weight: bold;
        }

        @media (max-width: 600px) {
            main {
                margin: 25px auto;
            }

            .card {
                padding: 20px;
            }

            .attendance-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
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
        <h2>Daily Attendance</h2>
        <p class="attendance-info">
            Date: <?= date('F d, Y') ?><br>
            Current time: <?= date('h:i:s A') ?>
        </p>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="success">
                <?= esc(session()->getFlashdata('success')) ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="error">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>

        <?php
            $hasTimedIn = !empty($attendance);
            $hasTimedOut = $hasTimedIn && !empty($attendance['time_out']);
        ?>

        <p>
            Attendance status:
            <span class="attendance-status">
                <?php if (!$hasTimedIn): ?>
                    Not Timed In
                <?php elseif ($hasTimedOut): ?>
                    Completed
                <?php else: ?>
                    Timed In
                <?php endif; ?>
            </span>
        </p>

        <?php if ($hasTimedIn): ?>
            <p>Time In: <?= esc(date('h:i:s A', strtotime($attendance['time_in']))) ?></p>
        <?php endif; ?>

        <?php if ($hasTimedOut): ?>
            <p>Time Out: <?= esc(date('h:i:s A', strtotime($attendance['time_out']))) ?></p>
        <?php endif; ?>

        <div class="attendance-actions">
            <form action="<?= site_url('employee/time-in') ?>" method="post">
                <?= csrf_field() ?>
                <button
                    type="submit"
                    class="btn time-in"
                    <?= $hasTimedIn ? 'disabled' : '' ?>
                >
                    Time In
                </button>
            </form>

            <form action="<?= site_url('employee/time-out') ?>" method="post">
                <?= csrf_field() ?>
                <button
                    type="submit"
                    class="btn time-out"
                    <?= (!$hasTimedIn || $hasTimedOut) ? 'disabled' : '' ?>
                >
                    Time Out
                </button>
            </form>
        </div>
    </section>

    <section class="card">
        <h2>Employee Portal</h2>
        <p>Welcome to your employee dashboard.</p>
        <p>For account access or assistance, please contact your HR department or administrator.</p>

        <?php if (session()->get('employee_role') === 'Admin'): ?>
            <p>
                <a class="portal-link" href="<?= site_url('employee/manage') ?>">
                    Manage Employees
                </a>
            </p>
        <?php endif; ?>
    </section>
</main>
</body>
</html>
