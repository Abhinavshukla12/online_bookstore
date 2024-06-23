<!-- app/Views/home.php -->

<?= $this->extend('ProjectViews/layout/default') ?>
<?= $this->section('content') ?>
<body style="background-color: #f2f2f2;">
<!-- Hero Section -->
<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">Welcome to Bookstore</h1>
    <p class="lead">Discover the best books, eBooks, and audiobooks.</p>
    <p>
      <a href="#" class="btn btn-primary my-2">Shop Now</a>
      <a href="#" class="btn btn-secondary my-2">Learn More</a>
    </p>
  </div>
</section>

<!-- Featured Books Carousel -->
<div id="featuredBooksCarousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://via.placeholder.com/1200x400" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Featured Book Title 1</h5>
        <p>Short description of the featured book.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://via.placeholder.com/1200x400" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Featured Book Title 2</h5>
        <p>Short description of the featured book.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://via.placeholder.com/1200x400" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Featured Book Title 3</h5>
        <p>Short description of the featured book.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#featuredBooksCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#featuredBooksCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- Book Categories -->
<div class="container my-5">
  <h2 class="text-center mb-4">Explore Categories</h2>
  <div class="row">
    <div class="col-md-3 mb-4">
      <div class="card shadow-sm">
        <img src="https://via.placeholder.com/200x200" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Fiction</h5>
          <p class="card-text">Explore a wide range of fiction books.</p>
          <a href="#" class="btn btn-primary">Explore</a>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card shadow-sm">
        <img src="https://via.placeholder.com/200x200" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Non-Fiction</h5>
          <p class="card-text">Discover non-fiction books on various topics.</p>
          <a href="#" class="btn btn-primary">Explore</a>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card shadow-sm">
        <img src="https://via.placeholder.com/200x200" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Science Fiction</h5>
          <p class="card-text">Dive into the world of science fiction.</p>
          <a href="#" class="btn btn-primary">Explore</a>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card shadow-sm">
        <img src="https://via.placeholder.com/200x200" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Romance</h5>
          <p class="card-text">Feel the love with romance novels.</p>
          <a href="#" class="btn btn-primary">Explore</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bestsellers -->
<div class="container my-5">
  <h2 class="text-center mb-4">Bestsellers</h2>
  <div class="row">
    <div class="col-md-3 mb-4">
      <div class="card shadow-sm">
        <img src="https://via.placeholder.com/200x300" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Bestseller Title 1</h5>
          <p class="card-text">Brief description of the bestseller.</p>
          <p class="card-text">
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star-half-alt text-warning"></i>
          </p>
          <a href="#" class="btn btn-primary">View Details</a>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card shadow-sm">
        <img src="https://via.placeholder.com/200x300" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Bestseller Title 2</h5>
          <p class="card-text">Brief description of the bestseller.</p>
          <p class="card-text">
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star-half-alt text-warning"></i>
          </p>
          <a href="#" class="btn btn-primary">View Details</a>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card shadow-sm">
        <img src="https://via.placeholder.com/200x300" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Bestseller Title 3</h5>
          <p class="card-text">Brief description of the bestseller.</p>
          <p class="card-text">
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star-half-alt text-warning"></i>
          </p>
          <a href="#" class="btn btn-primary">View Details</a>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card shadow-sm">
        <img src="https://via.placeholder.com/200x300" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Bestseller Title 4</h5>
          <p class="card-text">Brief description of the bestseller.</p>
          <p class="card-text">
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star-half-alt text-warning"></i>
          </p>
          <a href="#" class="btn btn-primary">View Details</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- User Reviews -->
<div class="container my-5">
  <h2 class="text-center mb-4">User Reviews</h2>
  <div class="row">
    <div class="col-md-6 mb-4">
      <div class="media shadow-sm p-3 rounded">
        <img src="https://via.placeholder.com/64" class="mr-3 rounded-circle" alt="...">
        <div class="media-body">
          <h5 class="mt-0">User Name 1</h5>
          <p>User review text goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div class="media shadow-sm p-3 rounded">
        <img src="https://via.placeholder.com/64" class="mr-3 rounded-circle" alt="...">
        <div class="media-body">
          <h5 class="mt-0">User Name 2</h5>
          <p>User review text goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div class="media shadow-sm p-3 rounded">
        <img src="https://via.placeholder.com/64" class="mr-3 rounded-circle" alt="...">
        <div class="media-body">
          <h5 class="mt-0">User Name 3</h5>
          <p>User review text goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div class="media shadow-sm p-3 rounded">
        <img src="https://via.placeholder.com/64" class="mr-3 rounded-circle" alt="...">
        <div class="media-body">
          <h5 class="mt-0">User Name 4</h5>
          <p>User review text goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
    </div>
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