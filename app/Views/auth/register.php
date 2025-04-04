<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - ElectroMarket</title>
    <?= view('layout/header') ?>
    <style>
        body {
            background: #f8f9fa;
        }

        .register-card {
            max-width: 450px;
            margin: 100px auto;
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            background: #fff;
        }

        .register-card .card-body {
            padding: 2rem;
        }

        .register-card h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            font-weight: bold;
            color: #0d6efd;
        }

        .btn-register {
            background-color: #0d6efd;
            color: #fff;
            font-weight: 600;
        }

        .btn-register:hover {
            background-color: #0b5ed7;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
        }
    </style>
</head>
<body>

<main>
    <div class="card register-card">
        <div class="card-body">
            <h2>📝 Register</h2>

            <form method="post" action="<?= base_url('register/save') ?>">

                <div class="mb-3">
                    <label for="name" class="form-label">👤 Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="John Doe" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">📧 Email</label>
                    <input type="email" name="email" class="form-control" placeholder="you@example.com" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">🔒 Password</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-register">Register</button>
                </div>
            </form>

            <div class="text-center">
                <p class="mb-0">Already have an account?
                    <a href="<?= base_url('login') ?>" class="text-primary text-decoration-none">Login here</a>
                </p>
            </div>
        </div>
    </div>
</main>

<?= view('layout/footer') ?>

</body>
</html>
