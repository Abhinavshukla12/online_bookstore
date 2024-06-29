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
    <link href="<?= base_url('path/to/your/custom.css') ?>" rel="stylesheet">

    <style>
      /* Custom CSS for resizing navbar */
.navbar {
    padding: 0.5rem 1rem;
}

.navbar-brand {
    margin-left: 20px;
}

.navbar-brand h2 {
    font-size: 1.5rem;
}

.navbar-nav .nav-link {
    font-size: 1rem;
    padding: 0.5rem 1rem;
    white-space: nowrap;
}

.form-inline .form-control {
    padding: 0.5rem;
}

.form-inline .btn {
    padding: 0.5rem 1rem;
}

.form-inline {
    margin-right: 20px;
    flex-grow: 1;
    justify-content: flex-end;
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
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('project/profile')?>">Your Profile</a>
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
