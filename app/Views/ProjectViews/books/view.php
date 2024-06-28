<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>

<style>
    /* Custom styles (same as before) */
    .book-section {
        /* Styles for book section */
    }

    .book-title {
        /* Styles for book title */
    }

    .book-details {
        /* Styles for book details */
    }

    .btn-purchase {
        /* Styles for purchase button */
    }

    .review-section {
        /* Styles for review section */
    }

    .review-title {
        /* Styles for review title */
    }

    .review-list {
        /* Styles for review list */
    }

    .list-group-item {
        /* Styles for list group item */
    }

    .add-review-section {
        /* Styles for add review section */
    }

    .btn-show-more {
        /* Styles for show more button */
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <!-- Book Section -->
            <div class="book-section">
                <h2 class="book-title"><?= esc($book['title']) ?></h2>

                <div class="row">
                    <div class="col-md-4">
                        <img src="<?= esc($book['image']) ?>" class="img-fluid" alt="<?= esc($book['title']) ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="book-details">
                            <p><strong>Author:</strong> <?= esc($book['author']) ?></p>
                            <p><strong>Description:</strong> <?= esc($book['description']) ?></p>
                            <p><strong>Price:</strong> $<?= esc($book['price']) ?></p>
                            <a href="<?= site_url('project/orders/payment/' . $book['id']) ?>" class="btn btn-success btn-purchase">Purchase</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Review Section -->
            <div class="review-section">
                <h3 class="review-title">Reviews</h3>
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <?php if (empty($reviews)): ?>
                    <p>No reviews yet.</p>
                <?php else: ?>
                    <ul class="list-group review-list">
                        <?php $reviewCount = 0; ?>
                        <?php foreach ($reviews as $review): ?>
                            <?php if ($reviewCount < 2): ?>
                                <li class="list-group-item">
                                    <strong>Rating:</strong>
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <?php if ($i <= $review['rating']): ?>
                                            <i class="fas fa-star text-warning"></i>
                                        <?php else: ?>
                                            <i class="far fa-star text-warning"></i>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    <br>
                                    <strong>Comment:</strong> <?= esc($review['comment']) ?><br>
                                    <small class="text-muted">Reviewed on <?= date('Y-m-d', strtotime($review['created_at'])) ?></small>
                                </li>
                            <?php endif; ?>
                            <?php $reviewCount++; ?>
                        <?php endforeach; ?>
                    </ul>
                    <?php if (count($reviews) > 2): ?>
                        <button class="btn btn-secondary btn-show-more mt-3">Show More</button>
                        <ul class="list-group review-list mt-3" style="display: none;">
                            <?php foreach (array_slice($reviews, 3) as $review): ?>
                                <li class="list-group-item">
                                    <strong>Rating:</strong>
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <?php if ($i <= $review['rating']): ?>
                                            <i class="fas fa-star text-warning"></i>
                                        <?php else: ?>
                                            <i class="far fa-star text-warning"></i>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    <br>
                                    <strong>Comment:</strong> <?= esc($review['comment']) ?><br>
                                    <small class="text-muted">Reviewed on <?= date('Y-m-d', strtotime($review['created_at'])) ?></small>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <!-- Add Review Section (same as before) -->
            <div class="add-review-section">
                <h4 class="mb-3">Add a Review</h4>
                <form action="<?= site_url('project/reviews/add') ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="book_id" value="<?= esc($book['id']) ?>">
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <select name="rating" id="rating" class="form-control">
                            <option value="1">&#9733;</option>
                            <option value="2">&#9733;&#9733;</option>
                            <option value="3">&#9733;&#9733;&#9733;</option>
                            <option value="4">&#9733;&#9733;&#9733;&#9733;</option>
                            <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea name="comment" id="comment" class="form-control" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Back Button (same as before) -->
    <a href="<?= site_url('project/books') ?>" class="btn btn-secondary mt-4">Back to Books Page</a>
</div>

<script>
    // JavaScript to toggle visibility of additional reviews on "Show More" button click
    document.addEventListener('DOMContentLoaded', function() {
        const showMoreButton = document.querySelector('.btn-show-more');
        const hiddenReviewList = document.querySelector('.review-section .review-list:nth-of-type(2)');

        if (showMoreButton && hiddenReviewList) {
            showMoreButton.addEventListener('click', function() {
                hiddenReviewList.style.display = 'block';
                showMoreButton.style.display = 'none';
            });
        }
    });
</script>

<?= $this->endSection() ?>
