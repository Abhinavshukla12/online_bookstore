<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>

<style>
    /* Advanced CSS styles */
    .custom-card {
        background-color: #f8f9fa; /* Light grey background */
        border: 1px solid #dee2e6; /* Light grey border */
        transition: transform 0.3s ease-in-out;
    }

    .custom-card:hover {
        transform: translateY(-5px); /* Hover effect */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow on hover */
    }

    .custom-card .card-title a {
        color: black; /* Blue link color */
        text-decoration: none; /* Remove underline */
        transition: color 0.3s ease-in-out;
    }

    .custom-card .card-title a:hover {
        color: red; /* Darker blue on hover */
    }

    .custom-card .card-text {
        color: #6c757d; /* Grey text color */
    }
</style>

<h4>Categories</h4>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<div class="row">
    <?php foreach ($categories as $category) : ?>
        <div class="col-md-3 col-lg-3 mb-4">
            <div class="card custom-card" style="background-color: #facbc8;">
                <div class="card-body">
                    <h5 class="card-title"><a href="<?= site_url('project/category/' . $category['id']) ?>"><?= esc($category['name']) ?></a></h5>
                    <p class="card-text text-primary-emphasis"><?= esc($category['description']) ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection() ?>
