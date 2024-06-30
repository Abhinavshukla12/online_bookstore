<!-- File: App\Views\ProjectViews/cart.php -->

<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>

<h3 class="mb-3">My Cart</h3>

<?php if (!empty($cartItems)): ?>
    <div class="cart-container">
        <?php foreach ($cartItems as $item): ?>
            <div class="cart-item">
                <div class="item-details">
                    <h5 class="item-title"><?= $item['title'] ?></h5>
                    <p class="item-author">by <?= $item['author'] ?></p>
                    <p class="item-price">$<?= number_format($item['price'], 2) ?></p>
                </div>
                <div class="item-action">
                    <form action="<?= site_url('project/cart/remove') ?>" method="post">
                        <input type="hidden" name="cart_id" value="<?= $item['id'] ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="cart-action">
        <form action="<?= site_url('project/cart/buy') ?>" method="post">
            <button type="submit" class="btn btn-success btn-lg">Buy Now</button>
        </form>
    </div>
<?php else: ?>
    <div class="alert alert-info">Your cart is empty.</div>
<?php endif; ?>

<style>
    .cart-container {
        display: grid;
        gap: 20px;
        margin: 20px 0;
    }

    .cart-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .cart-item:hover {
        background-color: #e9ecef;
    }

    .item-details {
        display: flex;
        flex-direction: column;
    }

    .item-title {
        font-size: 1.2em;
        margin: 0;
    }

    .item-author, .item-price {
        margin: 5px 0;
    }

    .item-action {
        display: flex;
        align-items: center;
    }

    .btn-danger {
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #dc3545;
        box-shadow: 0 0 10px rgba(220, 53, 69, 0.5);
    }

    .cart-action {
        text-align: center;
        margin-top: 20px;
    }

    .btn-success {
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-success:hover {
        background-color: #28a745;
        box-shadow: 0 0 10px rgba(40, 167, 69, 0.5);
    }

    .alert {
        text-align: center;
        font-size: 1.2em;
    }
</style>

<?= $this->endSection() ?>
