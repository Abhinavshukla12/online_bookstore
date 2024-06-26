<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>
<div class="container shift-left mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">My Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="username" class="font-weight-bold">Username:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="username" class="form-control" value="<?= esc($user['username']) ?>" readonly>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="email" class="font-weight-bold">Email:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="email" id="email" class="form-control" value="<?= esc($user['email']) ?>" readonly>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="fullname" class="font-weight-bold">Full Name:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="fullname" class="form-control" value="<?= esc($user['fullname']) ?>" readonly>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="dob" class="font-weight-bold">Date of Birth:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="dob" class="form-control" value="<?= esc($user['dob']) ?>" readonly>
                        </div>
                    </div>
                    <!-- Add more fields as needed -->
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>