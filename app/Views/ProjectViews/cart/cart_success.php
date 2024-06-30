<!-- File: App\Views\ProjectViews\cart_success.php -->

<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="alert alert-success text-center">
        <h4 class="alert-heading">Purchase Successful!</h4>
        <p>Thank you for your purchase. Your order has been placed successfully.</p>
        <hr>
        <p class="mb-0">You can view your order details in your <a href="<?= site_url('project/orders') ?>">order history</a>.</p>
    </div>
</div>

<?= $this->endSection() ?>
