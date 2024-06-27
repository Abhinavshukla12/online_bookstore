<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>
<body>

<!-- Hero Section -->
<section class="jumbotron text-center" style="background-image: url('<?= base_url('assets/images/hero/h2.jpg') ?>'); background-size: cover; background-position: center; color: white;">
  <div class="container">
    <h1 class="jumbotron-heading text-white">Welcome to Bookstore</h1>
    <p class="lead">Discover the best books, eBooks, and audiobooks.</p>
    <p>
      <a href="<?= site_url('project/books') ?>" class="btn btn-primary my-2">Shop Now</a>
    </p>
  </div>
</section>

<!-- Book Categories -->
<div class="container my-5">
  <h2 class="text-center mb-4">Explore Categories</h2>
  <div class="row">
    <?php foreach ($categories as $category): ?>
      <div class="col-md-3 mb-4">
        <div class="card shadow-sm">
          <img src="https://via.placeholder.com/200x200" class="card-img-top" alt="<?= esc($category['name']) ?>">
          <div class="card-body">
            <h5 class="card-title"><?= esc($category['name']) ?></h5>
            <p class="card-text"><?= esc($category['description']) ?></p>
            <a href="<?= site_url('project/category/' . $category['id']) ?>" class="btn btn-primary">Explore</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Bestsellers -->
<div class="container my-5">
  <h2 class="text-center mb-4">Bestsellers</h2>
  <div class="row">
    <?php foreach ($bestsellers as $book): ?>
      <div class="col-md-3 mb-4">
        <div class="card shadow-sm">
          <img src="<?= esc($book['image']) ?>" class="card-img-top" alt="<?= esc($book['title']) ?>">
          <div class="card-body">
            <h5 class="card-title"><?= esc($book['title']) ?></h5>
            <p class="card-text"><?= esc($book['description']) ?></p>
            <?php if ($book['avg_rating'] !== null): ?>
              <p class="card-text">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                  <i class="fas fa-star<?= $i <= $book['avg_rating'] ? ' text-warning' : '-half-alt text-warning' ?>"></i>
                <?php endfor; ?>
              </p>
            <?php endif; ?>
            <a href="<?= site_url('project/books/view/'.$book['id']) ?>" class="btn btn-primary">View Details</a>
          </div>
          <?php if (count($book['latest_reviews']) > 0): ?>
            <div class="card-footer">
              <h6>User Reviews:</h6>
              <?php foreach ($book['latest_reviews'] as $review): ?>
                <p><?= esc($review['comment']) ?></p>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Newsletter Subscription -->
<div class="container my-5">
  <div class="jumbotron newsletter-jumbotron text-center">
    <h4>Subscribe to our Newsletter</h4>
    <form class="form-inline justify-content-center mt-4">
      <div class="form-group mb-2">
        <label for="email" class="sr-only">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Enter your email">
      </div>
      <button type="submit" class="btn btn-primary mb-2">Subscribe</button>
    </form>
  </div>
</div>

</body>
<?= $this->endSection() ?>