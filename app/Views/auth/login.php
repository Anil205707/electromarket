<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - ElectroMarket</title>
    <?= view('layout/header') ?>
    <style>
        body {
            background: #f8f9fa;
        }

        .login-card {
            max-width: 400px;
            margin: 100px auto;
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            background: #fff;
        }

        .login-card .card-body {
            padding: 2rem;
        }

        .login-card h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            font-weight: bold;
            color: #0d6efd;
        }

        .btn-login {
            background-color: #0d6efd;
            color: #fff;
            font-weight: 600;
        }

        .btn-login:hover {
            background-color: #0b5ed7;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
        }

        .text-link {
            display: block;
            text-align: center;
            margin-top: 1rem;
            font-size: 14px;
        }

        .btn-google {
            background-color: #ffffff;
            border: 1px solid #ddd;
            color: #444;
            font-weight: 500;
        }

        .btn-google img {
            height: 20px;
            margin-right: 8px;
        }
    </style>
</head>
<body>

<main>
    <div class="card login-card">
        <div class="card-body">
            <h2>🔐 Login</h2>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger text-center">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= base_url('login/check') ?>">
                <div class="mb-3">
                    <label for="email" class="form-label">📧 Email</label>
                    <input type="email" class="form-control" name="email" required placeholder="you@example.com">
                </div>
                <div class="mb-2">
                    <label for="password" class="form-label">🔒 Password</label>
                    <input type="password" class="form-control" name="password" required placeholder="••••••••">
                </div>
                <div class="text-end mb-3">
                    <a href="#" class="text-decoration-none text-primary" style="font-size: 14px;">Forgot password?</a>
                </div>
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-login">Login</button>
                </div>
            </form>

            <!-- Google Login (just styled for now) -->
            <div class="d-grid mb-2">
                <button class="btn btn-google">
                    <img src="https://cdn-icons-png.flaticon.com/512/281/281764.png" alt="Google Logo">
                    Login with Google
                </button>
            </div>

            <!-- Register link -->
            <div class="text-center mt-3">
                <p class="mb-0">Don't have an account? <a href="<?= base_url('register') ?>" class="text-primary text-decoration-none">Register</a></p>
            </div>
        </div>
    </div>
</main>

<?= view('layout/footer') ?>

</body>
</html>
