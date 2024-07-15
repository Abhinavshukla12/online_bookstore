<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>

<style>
    body{
        background-color: #7D8ABC;
    }
    /* Custom CSS for book grid */
    .book-grid {
        background-color: #FFF8F3; /* Light grey background */
        padding: 20px;
        border-radius: 10px;
    }

    .book-grid .card {
        transition: transform 0.2s;
    }

    .book-grid .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .book-grid .card-title {
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
    }

    .book-grid .card-text {
        font-size: 0.9rem;
        color: #6c757d;
    }
    #addtocart{
        width: 120px;
        height: 48px;
        font-size: 0.8rem;
        background-color: #DD5746;
    }
    #viewbtn{
        width: 110px;
        height: 48px;
        font-size: 0.9rem;
    }
</style>
<body>
<div class="container">
    <br>
    <h4>Books in <?= esc($category['name']) ?></h4>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="row book-grid">
        <?php if (empty($books)) : ?>
            <div class="col-md-12">
                <div class="alert alert-info">No books available in this category.</div>
            </div>
        <?php else : ?>
            <?php foreach ($books as $book) : ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body" style="background-color: #F7E7DC;">
                            <h5 class="card-title"><?= esc($book['title']) ?></h5>
                            <p class="card-text text-primary-emphasis"><?= esc($book['description']) ?></p>
                            <p class="card-text text-primary-emphasis"><strong>Author:</strong> <?= esc($book['author']) ?></p>
                            <p class="card-text text-primary-emphasis"><strong>Price:</strong> $<?= esc($book['price']) ?></p>
                            <p class="card-text text-primary-emphasis"><strong>Rating:</strong> <?= number_format($book['averageRating'], 1) ?> / 5</p>
                            <a href="<?= site_url('project/books/view/'.$book['id']) ?>" id="viewbtn" class="btn btn-warning btn-sm">View</a>
                            <form action="<?= site_url('project/cart/add') ?>" method="post" class="d-inline">
                                <input type="hidden" name="book_id" value="<?= $book['id'] ?>">
                                <button type="submit" class="btn btn-primary btn-sm" id="addtocart">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<br>
<div class="mb-3">
    <a href="<?= base_url('project/categories') ?>" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Back to Categories</a>
</div>    
</body>

<?= $this->endSection() ?>