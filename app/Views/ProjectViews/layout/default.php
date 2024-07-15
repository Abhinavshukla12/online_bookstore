<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?= csrf_hash() ?>">
    <title>Bookstore</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="<?= base_url('node_modules/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Bootswatch CSS -->
    <link href="<?= base_url('node_modules/bootswatch/dist/lux/bootstrap.min.css') ?>" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="<?= base_url('assets/css/layout/v1.0/main.css') ?>" rel="stylesheet">

    <style>
      nav{
        background-color: #405D72;
      }
      .navbar-brand h2{
        color: #fff;
      }
      .nav-link{
        color: white;
      }
    </style>
    <?php
    if (isset($css)) {
        foreach ($css as $style):
            echo '<link href="' . base_url($style) . '" rel="stylesheet">';
        endforeach;
    }
    ?>
</head>

<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?=base_url('project/home')?>" style="margin-left: 20px;"><h2>E-book cluB</h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url('project/home')?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('project/books')?>">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('project/categories')?>">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('project/about')?>">About</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0 ml-auto" method="get" action="<?= base_url('project/search') ?>" style="margin-right: 20px;">
                <div class="input-group">
                    <input class="form-control" type="search" placeholder="Search books" aria-label="Search" name="query" style="background-color: #c1c7c3; padding: 6px; font-size: 15px;">
                    <div class="input-group-append">
                        <button class="btn btn-danger" type="submit" style="left: 5px; padding: 5px; font-size: 14px;">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Your Profile
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="<?=base_url('project/profile')?>">My Profile</a>
                            <a class="dropdown-item" href="<?=base_url('project/cart')?>">Cart</a>
                            <a class="dropdown-item" href="<?=base_url('')?>">Orders</a>
                            <a class="dropdown-item" href="#">Wishlist</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?=base_url('project/logout')?>">Logout</a>
                        </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main content -->
<div class="container">
    <?= $this->renderSection('content') ?>
</div>

<!-- Footer -->
<footer class="text-center py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>About Us</h5>
                <p>Information about the bookstore.</p>
            </div>
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="<?=base_url('project/home')?>">Home</a></li>
                    <li><a href="<?=base_url('project/books')?>">Books</a></li>
                    <li><a href="<?=base_url('project/categories')?>">Categories</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Follow Us</h5>
                <a href="#"><i class="fab fa-facebook fa-2x mr-3"></i></a>
                <a href="#"><i class="fab fa-twitter fa-2x mr-3"></i></a>
                <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <p>&copy; 2024 Bookstore Software</p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery, Popper.js, Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $.ajaxPrefilter(function (options, originalData, xhr) {
        var data = "<?php echo csrf_token(). '=' . csrf_hash(); ?>" + "&random=" + Math.random();
        if (options.data) {
            options.data += "&" + data;
        } else {
            options.data = data;
        }
    });
</script>

<?php
if (isset($js)) {
    foreach ($js as $script):
        echo '<script src="' . base_url($script) . '"></script>';
    endforeach;
}
?>
</body>

</html>
