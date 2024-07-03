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

<?= $this->endSection() ?>
