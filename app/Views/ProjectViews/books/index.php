<?= $this->extend('ProjectViews/layout/default') ?>
<?= $this->section('content') ?>
<body>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<h3 class="mb-3">Bestsellers</h3>
<div class="row mb-5">
    <?php foreach ($bestsellers as $book): ?>
        <div class="col-md-3 mb-4">
            <div class="card custom-card">
                <div class="card-body" style="background-color: #FFF8DB;">
                    <img src="<?= esc($book['image']) ?>" class="card-img-top" alt="<?= esc($book['title']) ?>">
                    <div class="card-details">
                        <h5 class="card-title"><?= esc($book['title']) ?></h5>
                        <p class="card-text"><?= esc($book['author']) ?></p>
                        <p class="card-text"><?= esc($book['description']) ?></p>
                        <p class="card-text">$<?= esc($book['price']) ?></p>
                        <p class="card-text">
                            <strong>Rating:</strong> <?= number_format($book['averageRating'], 1) ?> / 5
                        </p>
                        <a href="<?= site_url('project/books/view/'.$book['id']) ?>" class="btn btn-danger btn-sm">View</a>
                        <form action="<?= site_url('project/cart/add') ?>" method="post" class="d-inline">
                            <input type="hidden" name="book_id" value="<?= $book['id'] ?>">
                            <button type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<h3 class="mb-3">All Books</h3>
<div class="row">
    <?php foreach ($books as $book): ?>
        <div class="col-md-3 mb-4">
            <div class="card custom-card">
                <div class="card-body" style="background-color: #FFF8DB;">
                    <img src="<?= esc($book['image']) ?>" class="card-img-top" alt="<?= esc($book['title']) ?>">
                    <div class="card-details">
                        <h5 class="card-title"><?= esc($book['title']) ?></h5>
                        <p class="card-text"><?= esc($book['author']) ?></p>
                        <p class="card-text"><?= esc($book['description']) ?></p>
                        <p class="card-text">$<?= esc($book['price']) ?></p>
                        <p class="card-text">
                            <strong>Rating:</strong> <?= number_format($book['averageRating'], 1) ?> / 5
                        </p>
                        <a href="<?= site_url('project/books/view/'.$book['id']) ?>" class="btn btn-danger btn-sm">View</a>
                        <form action="<?= site_url('project/cart/add') ?>" method="post" class="d-inline">
                            <input type="hidden" name="book_id" value="<?= $book['id'] ?>">
                            <button type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
<style>
    body{
        background-color: #7D8ABC;
    }
    .custom-card {
        border: 1px solid #ccc;
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 10px;
    }

    .custom-card .card-body {
        padding: 0.75rem;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .custom-card img {
        width: 100%;
        height: auto;
        object-fit: cover;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .custom-card .card-details {
        padding: 0.75rem;
        text-align: center;
    }

    .custom-card .card-title {
        font-size: 1rem;
        margin-bottom: 0.5rem;
    }

    .custom-card .card-text {
        font-size: 0.9rem;
        color: black;
        margin-bottom: 0.5rem;
    }

    .custom-card .btn {
        font-size: 0.8rem;
        padding: 0.2rem 0.5rem;
        margin-top: 0.4rem;
    }
</style>
<?= $this->endSection() ?>
