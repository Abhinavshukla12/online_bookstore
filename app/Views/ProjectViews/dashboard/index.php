<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>
<body>
<!-- Hero Section -->
<header class="banner">
        <div class="banner-content">
            <h1>Welcome to Our Bookstore</h1>
            <p>Discover a world of books at your fingertips.</p>
            <div class="banner-buttons">
                <a href="<?=base_url('project/categories')?>" class="btn explore-btn"><span>See categories..</span></a>
                <a href="<?=base_url('project/books')?>" class="btn shop-btn"><span>Shop Now...</span></a>
            </div>
        </div>
    </header>

<!-- Book Categories -->
<div class="container my-5">
  <h2 class="text-center mb-4">Explore Categories</h2>
  <div class="row">
    <?php foreach (array_slice($categories, 0, 4) as $category): ?>
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
            <p class="card-text">
              <?php for ($i = 1; $i <= 5; $i++): ?>
                <i class="fas fa-star<?= $i <= $book['avg_rating'] ? ' text-warning' : '-half-alt text-warning' ?>"></i>
              <?php endfor; ?>
            </p>
            <a href="<?= site_url('project/books/view/'.$book['id']) ?>" class="btn btn-primary">View Details</a>
          </div>
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
