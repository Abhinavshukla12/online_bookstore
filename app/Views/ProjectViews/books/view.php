<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>

<style>
    /* Custom styles */
    .book-section {
        background-color: #f9f9f9; /* Light background for book section */
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease-in-out;
    }

    .book-section:hover {
        background-color: #f0f0f0; /* Darker background on hover */
    }

    .book-title {
        font-size: 1.8rem;
        color: #333;
    }

    .book-details {
        padding: 20px;
    }

    .btn-purchase {
        border-radius: 6px;
        transition: transform 0.2s ease-in-out;
    }

    .btn-purchase:hover {
        transform: scale(1.05); /* Scale up on hover */
    }

    .review-section {
        background-color: #fff; /* White background for review section */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .review-title {
        font-size: 1.6rem;
        color: #333;
    }

    .review-list {
        margin-top: 10px;
    }

    .list-group-item {
        border: none;
        padding: 12px;
    }

    .add-review-section {
        margin-top: 20px;
        padding: 20px;
        background-color: #f9f9f9; /* Light background for add review section */
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .btn-show-more,
    .btn-show-less {
        margin-top: 10px;
    }

    .average-rating {
        font-size: 1.5rem;
        color: #333;
        margin-top: 10px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-8">
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
                            <p class="average-rating"><h4>Rating:</h4> <?= number_format($averageRating, 1) ?> / 5</p>
                            <a href="<?= site_url('project/orders/payment/' . $book['id']) ?>" class="btn btn-success btn-purchase">Purchase</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
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
                            <?php if ($reviewCount < 3): ?>
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
                    <?php if (count($reviews) > 3): ?>
                        <button class="btn btn-secondary btn-show-more mt-3">Show More</button>
                        <ul class="list-group review-list mt-3 d-none">
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
                        <button class="btn btn-secondary btn-show-less mt-3 d-none">Show Less</button>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

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

    <a href="<?= site_url('project/books') ?>" class="btn btn-secondary mt-4">Back to Books Page</a>
</div>

<script>
    // JavaScript to toggle visibility of additional reviews on "Show More" and "Show Less" button clicks
    document.addEventListener('DOMContentLoaded', function() {
        const showMoreButton = document.querySelector('.btn-show-more');
        const showLessButton = document.querySelector('.btn-show-less');
        const hiddenReviewList = document.querySelector('.review-section .review-list:nth-of-type(2)');

        if (showMoreButton && hiddenReviewList && showLessButton) {
            showMoreButton.addEventListener('click', function() {
                hiddenReviewList.classList.remove('d-none');
                showMoreButton.classList.add('d-none');
                showLessButton.classList.remove('d-none');
            });

            showLessButton.addEventListener('click', function() {
                hiddenReviewList.classList.add('d-none');
                showMoreButton.classList.remove('d-none');
                showLessButton.classList.add('d-none');
            });
        }
    });
</script>

<?= $this->endSection() ?>
