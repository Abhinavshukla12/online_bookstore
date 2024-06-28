<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<h3 class="mb-3">Bestsellers</h3>
<div class="row mb-5">
    <?php foreach ($bestsellers as $book): ?>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="<?= esc($book['image']) ?>" class="card-img-top" alt="<?= esc($book['title']) ?>">
                <div class="card-body"  style="background-color: #e6b9b5;">
                    <h5 class="card-title text-black"><?= esc($book['title']) ?></h5>
                    <p class="card-text text-primary-emphasis"><?= esc($book['author']) ?></p>
                    <p class="card-text text-primary-emphasis"><?= esc($book['description']) ?></p>
                    <p class="card-text text-primary-emphasis">$<?= esc($book['price']) ?></p>
                    <a href="<?= site_url('project/books/view/'.$book['id']) ?>" class="btn btn-danger btn-sm">View</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<h3 class="mb-3">All Books</h3>
<div class="row">
    <?php foreach ($books as $book): ?>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="<?= esc($book['image']) ?>" class="card-img-top" alt="<?= esc($book['title']) ?>">
                <div class="card-body"  style="background-color: #facbc8;">
                    <h5 class="card-title text-black"><?= esc($book['title']) ?></h5>
                    <p class="card-text text-primary-emphasis"><?= esc($book['author']) ?></p>
                    <p class="card-text text-primary-emphasis"><?= esc($book['description']) ?></p>
                    <p class="card-text text-primary-emphasis">$<?= esc($book['price']) ?></p>
                    <a href="<?= site_url('project/books/view/'.$book['id']) ?>" class="btn btn-danger btn-sm">View</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection() ?>
