<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <h2>User Login</h2>
                    <?php if(session()->has('error')): ?>
                        <p style="color: red;"><?= session('error') ?></p>
                    <?php endif; ?>
                    <?php if(session()->has('success')): ?>
                        <p style="color: green;"><?= session('success') ?></p>
                    <?php endif; ?>
                    <form action="<?= site_url('project/login') ?>" method="post">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                    <p class="mt-3 text-center">Don't have an account? <a href="<?= site_url('project/register') ?>">Register</a></p>
                </div>
            </div>
        </div>
    </div>
    <style>
        .form-container {
            background-color: #ffffff;
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            padding: 2rem;
        }

        .form-container h2 {
            margin-bottom: 2rem;
        }

        .form-control {
            border-radius: 0.25rem;
        }

        .btn-primary {
            border-radius: 0.25rem;
            padding: 0.5rem 2rem;
        }

        @media (max-width: 576px) {
            .form-container {
                padding: 1rem;
            }

            .btn-primary {
                padding: 0.5rem 1rem;
            }
        }
    </style>
    <?= $this->endSection() ?>