<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>
<body>
<br>
<!-- Hero Section -->
<header class="banner" style="background-color: #758694;">
    <div class="banner-content text-center text-white py-5">
        <h1 class="hero-title mb-3" style="font-size: 2.3rem;">Welcome to Our Bookstore</h1>
        <p class="hero-description mb-4" style="font-size: 1.2rem;">Discover a world of books at your fingertips.</p>
        <div class="banner-buttons">
            <a href="<?= base_url('project/categories') ?>" class="btn btn-explore" style="color: black;"><span>Explore Categories</span></a>
            <a href="<?= base_url('project/books') ?>" class="btn btn-shop" style="color: black;"><span>Shop Now</span></a>
        </div>
    </div>
</header>

<!-- Book Categories -->
<section class="section-categories my-4">
    <div class="container">
        <h3 class="section-title text-center mb-4">Explore Categories</h3>
        <div class="row">
            <?php foreach (array_slice($categories, 0, 4) as $category): ?>
                <div class="col-md-3 mb-4">
                    <div class="card category-card shadow-sm" style="background-color: #FFF8DB;">
                        <img src="https://via.placeholder.com/150x150" class="card-img-top" alt="<?= esc($category['name']) ?>">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 1.1rem;"><?= esc($category['name']) ?></h5>
                            <p class="card-text" style="font-size: 0.9rem;"><?= esc($category['description']) ?></p>
                            <a href="<?= site_url('project/category/' . $category['id']) ?>" class="btn btn-explore"><span>Explore</span></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Bestsellers -->
<section class="section-bestsellers my-3">
    <div class="container">
        <h3 class="section-title text-center mb-4">Bestsellers</h3>
        <div class="row">
            <?php foreach ($bestsellers as $book): ?>
                <div class="col-md-3 mb-4">
                    <div class="card book-card shadow-sm" style="background-color: #FFF8DB;">
                        <img src="<?= esc($book['image']) ?>" class="card-img-top" alt="<?= esc($book['title']) ?>">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 1.1rem;"><?= esc($book['title']) ?></h5>
                            <p class="card-text" style="font-size: 0.9rem;"><?= esc($book['description']) ?></p>
                            <div class="rating" style="font-size: 0.9rem;">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <i class="fas fa-star<?= $i <= $book['avg_rating'] ? ' text-warning' : '-half-alt' ?>"></i>
                                <?php endfor; ?>
                            </div>
                            <a href="<?= site_url('project/books/view/'.$book['id']) ?>" class="btn btn-view-details"><span>View Details</span></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Newsletter Subscription -->
<section class="section-newsletter my-3">
    <div class="container"><br>
        <div class="jumbotron newsletter-jumbotron text-center p-5" style="background-color: #FFF8DB; box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);">
            <h4 class="newsletter-title mb-3" style="font-size: 1.3rem;">Subscribe to our Newsletter</h4>
            <form class="newsletter-form form-inline justify-content-center">
                <div class="form-group mb-2">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" class="form-control mr-3" id="email" placeholder="Enter your email">
                </div>
                <button type="submit" class="btn btn-subscribe" style="font-size: 1rem;"><span>Subscribe</span></button>
            </form>
        </div>
    </div><br>
</section>

</body>

<style>
    body{
        background-color: #7D8ABC;
    }
    .form-control{
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        font-size: 1rem;
        background-color: #fff;
    }
    .btn-subscribe{
        background-color: #DD5746;
        color: #fff;
    }
    .container{
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>
<?= $this->endSection() ?>