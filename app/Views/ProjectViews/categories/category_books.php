<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1>Books in <?= esc($category['name']) ?></h1>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="row">
        <?php if (empty($books)) : ?>
            <div class="col-md-12">
                <div class="alert alert-info">No books available in this category.</div>
            </div>
        <?php else : ?>
            <?php foreach ($books as $book) : ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($book['title']) ?></h5>
                            <p class="card-text"><?= esc($book['description']) ?></p>
                            <p class="card-text"><strong>Author:</strong> <?= esc($book['author']) ?></p>
                            <p class="card-text"><strong>Price:</strong> <?= esc($book['price']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
