<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>

<h2 class="mb-4"><?= esc($book['title']) ?></h2>

<div class="card mb-4">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="<?= esc($book['image']) ?>" class="card-img" alt="<?= esc($book['title']) ?>">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= esc($book['title']) ?></h5>
                <p class="card-text"><strong>Author:</strong> <?= esc($book['author']) ?></p>
                <p class="card-text"><strong>Description:</strong> <?= esc($book['description']) ?></p>
                <p class="card-text"><strong>Price:</strong> $<?= esc($book['price']) ?></p>
                <a href="<?= site_url('project/orders/payment/' . $book['id']) ?>" class="btn btn-success mt-3">Purchase</a>
            </div>
        </div>
    </div>
</div>

<h3>Reviews</h3>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (empty($reviews)): ?>
    <p>No reviews yet.</p>
<?php else: ?>
    <ul class="list-group mb-4">
        <?php foreach ($reviews as $review): ?>
            <li class="list-group-item">
                <strong>Rating:</strong> <?= esc($review['rating']) ?>/5<br>
                <strong>Comment:</strong> <?= esc($review['comment']) ?><br>
                <small class="text-muted">Reviewed on <?= date('Y-m-d', strtotime($review['created_at'])) ?></small>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<h4>Add a Review</h4>
<form action="<?= site_url('project/reviews/add') ?>" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="book_id" value="<?= esc($book['id']) ?>">
    <div class="form-group">
        <label for="rating">Rating</label>
        <select name="rating" id="rating" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    <div class="form-group">
        <label for="comment">Comment</label>
        <textarea name="comment" id="comment" class="form-control" rows="4"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit Review</button>
</form>

<a href="<?= site_url('project/books') ?>" class="btn btn-secondary mt-4">Back to Books Page</a>

<?= $this->endSection() ?>
