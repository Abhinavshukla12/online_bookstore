<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    .fade-in {
        animation: fadeIn 1s ease-in-out;
    }

    .search-results-container {
        background-color: white;
        color: black;
    }

    .search-results {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    .search-item {
        background-color: #facbc8;
        color: black;
        padding: 15px;
        border-radius: 5px;
    }

    .search-item h4 {
        margin-top: 0;
    }

    .average-rating {
        margin-top: 10px;
    }
</style>

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
