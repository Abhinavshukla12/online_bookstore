<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="form-container">
                <h2>Make your account</h2>
                <?php if(session()->has('error')): ?>
                    <p class="alert alert-danger"><?= session('error') ?></p>
                <?php endif; ?>
                <?php if(session()->has('success')): ?>
                    <p class="alert alert-success"><?= session('success') ?></p>
                <?php endif; ?>
                <form action="<?= site_url('project/register') ?>" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your full name" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div><br>
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-container">
                <h2>Login Here</h2>
                <?php if(session()->has('error')): ?>
                    <p class="alert alert-danger"><?= session('error') ?></p>
                <?php endif; ?>
                <?php if(session()->has('success')): ?>
                    <p class="alert alert-success"><?= session('success') ?></p>
                <?php endif; ?>
                <form action="<?= site_url('project/login') ?>" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div><br>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.form-container {
    background: linear-gradient(135deg, #6d5b98, #8e85c7);
    border-radius: 0.5rem;
    box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.15);
    padding: 2rem;
    margin-top: 2rem;
    color: #000000; /* Set the font color inside the form container to black */
    transition: transform 0.3s ease-in-out;
}

.form-container:hover {
    transform: translateY(-5px);
}

.form-container h2 {
    margin-bottom: 2rem;
    color: #ffffff;
    font-weight: 700;
}

.form-container label {
    font-weight: bold;
    margin-top: 1rem;
    display: inline-block;
    color: #000000; /* Ensure labels are black */
}

.form-control {
    border-radius: 0.25rem;
    border: none;
    box-shadow: 0 0.1rem 0.25rem rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease;
}

.form-control:focus {
    box-shadow: 0 0.1rem 0.5rem rgba(0, 0, 0, 0.2);
    outline: none;
}

.form-control::placeholder {
    color: #333; /* Darker black placeholder color */
    opacity: 1;
    font-weight: 600; /* Increase font weight of placeholder */
}

.form-control:focus::placeholder {
    opacity: 0;
    transition: opacity 0.3s ease;
}

.btn-primary {
    width: 80%;
    border-radius: 0.25rem;
    padding: 0.5rem 2rem;
    background: linear-gradient(135deg, #4e3b76, #6d5b98);
    border: none;
    transition: background 0.3s ease, transform 0.3s ease;
    display: block;
    margin: 0 auto; /* This centers the button horizontally */
}

.btn-primary:hover {
    background: linear-gradient(135deg, #3b2a5c, #5b4a86);
    transform: translateY(-3px);
}

.alert {
    border-radius: 0.25rem;
    padding: 0.5rem 1rem;
    margin-bottom: 1rem;
}

.mt-3 {
    margin-top: 1rem !important;
}

@media (max-width: 768px) {
    .container {
        padding: 1rem;
    }

    .row {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .form-container {
        margin-top: 1rem;
        padding: 1rem;
        width: 100%;
    }

    .btn-primary {
        padding: 0.5rem 1rem;
    }
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
