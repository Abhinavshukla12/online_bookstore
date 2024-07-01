<!-- File: App\Views\ProjectViews\cart_payment.php -->

<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>

<h3 class="mb-3">Payment</h3>

<form action="<?= site_url('project/processPayment') ?>" method="post">
    <div class="form-group">
        <label for="cardNumber">Card Number</label>
        <input type="text" class="form-control" id="cardNumber" name="cardNumber" required>
    </div>
    <div class="form-group">
        <label for="expiryDate">Expiry Date</label>
        <input type="text" class="form-control" id="expiryDate" name="expiryDate" required>
    </div>
    <div class="form-group">
        <label for="cvv">CVV</label>
        <input type="text" class="form-control" id="cvv" name="cvv" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit Payment</button>
</form>

<?= $this->endSection() ?>
