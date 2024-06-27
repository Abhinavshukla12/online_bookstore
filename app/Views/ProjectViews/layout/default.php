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

    <!-- Load custom CSS -->
    
    <!-- Bootstrap css -->
    <?php
    if (isset($css)) {
        foreach ($css as $style):
            echo '<link href="' . base_url('' . $style) . '" rel="stylesheet">';
        endforeach;
    }
    ?>
</head>

<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="<?=base_url('project/home')?>"><h2>E-book cluB</h2></a>
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
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('project/logout')?>">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <!-- the main content goes here -->
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
          <li><a href="#">Categories</a></li>
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

    <!-- Bootstrap JS, Font Awesome JS, and Custom JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <!-- jQuery, Popper.js, and Bootstrap JS -->
    <script type="text/javascript">
        $.ajaxPrefilter(function (options, originalData, xhr) {
            var data = "<?php echo  csrf_token(). '=' . csrf_hash(); ?>" + "&random=" + Math.random();
            if (options.data) {
                options.data += "&" + data;
            } else {
                options.data = data;
            }
        });
    </script>

    <!-- Load custom JS -->
    <?php
    if (isset($js)) {
        foreach ($js as $script):
            echo '<script src="' . base_url('' . $script) . '"></script>';
        endforeach;
    }
    ?>
</body>

</html>