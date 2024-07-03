<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>

<div class="container mt-1">
    <div class="row">
        <div class="col-12 search-results-container">
            <h3>Results</h3>
            <?php if (!empty($results)): ?>
                <div class="search-results">
                    <?php foreach ($results as $book): ?>
                        <div class="search-item fade-in">
                            <h4><?= esc($book['title']) ?></h4>
                            <p><?= esc($book['author']) ?></p>
                            <p><?= esc($book['description']) ?></p>
                            <p class="average-rating"><strong>Rating:</strong> <?= number_format($book['averageRating'], 1) ?> / 5</p>
                            <a href="<?= site_url('project/books/view/'.$book['id']) ?>" class="btn btn-danger btn-sm">View</a>
                            <form action="<?= site_url('project/cart/add') ?>" method="post" class="d-inline">
                                <input type="hidden" name="book_id" value="<?= $book['id'] ?>">
                                <button type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>No results found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
