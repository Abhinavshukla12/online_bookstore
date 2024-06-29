<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>

<h3 class="mb-3">Shopping Cart</h3>

<?php if (!empty($cartItems)): ?>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cartItems as $item): ?>
                <tr>
                    <td><?= $item['title'] ?></td>
                    <td><?= $item['author'] ?></td>
                    <td>$<?= $item['price'] ?></td>
                    <td>
                        <form action="<?= site_url('project/cart/remove') ?>" method="post">
                            <input type="hidden" name="cart_id" value="<?= $item['id'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Your cart is empty.</p>
<?php endif; ?>

<?= $this->endSection() ?>
