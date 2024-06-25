<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>
<h2 class="mb-4">Your Orders</h2>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (empty($orders)): ?>
    <p>You have not placed any orders yet.</p>
<?php else: ?>
    <ul class="list-group mb-4">
        <?php foreach ($orders as $order): ?>
            <li class="list-group-item">
                <strong>Book ID:</strong> <?= esc($order['book_id']) ?><br>
                <strong>Quantity:</strong> <?= esc($order['quantity']) ?><br>
                <strong>Total Price:</strong> $<?= esc($order['total_price']) ?><br>
                <small class="text-muted">Ordered on <?= date('Y-m-d', strtotime($order['created_at'])) ?></small>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<a href="<?= site_url('project/books') ?>" class="btn btn-secondary mt-4">Back to Books Page</a>

<?= $this->endSection() ?>
