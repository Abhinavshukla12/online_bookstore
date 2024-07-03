<?= $this->extend('ProjectViews/layout/default') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<h3 class="mb-3">My Wishlist</h3>
<div class="row">
    <?php if (empty($wishlist)): ?>
        <p>Your wishlist is empty.</p>
    <?php else: ?>
        <?php foreach ($wishlist as $item): ?>
            <div class="col-md-12 mb-4">
                <div class="card custom-card">
                    <div class="card-body">
                        <img src="<?= esc($item['image']) ?>" class="card-img-top" alt="<?= esc($item['title']) ?>">
                        <div class="card-details">
                            <h5 class="card-title"><?= esc($item['title']) ?></h5>
                            <p class="card-text"><?= esc($item['author']) ?></p>
                            <p class="card-text"><?= esc($item['description']) ?></p>
                            <p class="card-text">$<?= esc($item['price']) ?></p>
                            <a href="<?= site_url('project/books/view/'.$item['id']) ?>" class="btn btn-danger btn-sm">View</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
