<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<h3 class="mb-3">Bestsellers-></h3>
<div class="table-responsive mb-5">
    <table class="table table-hover table-secondary">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bestsellers as $book): ?>
                <tr>
                    <td><img src="<?= esc($book['image']) ?>" alt="<?= esc($book['title']) ?>" width="100" class="img-thumbnail"></td>
                    <td><?= esc($book['title']) ?></td>
                    <td><?= esc($book['author']) ?></td>
                    <td><?= esc($book['description']) ?></td>
                    <td>$<?= esc($book['price']) ?></td>
                    <td>
                        <a href="<?= site_url('project/books/view/'.$book['id']) ?>" class="btn btn-danger btn-sm">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<h3 class="mb-3">All Books-></h3>
<div class="table-responsive">
    <table class="table table-hover table-secondary">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td><img src="<?= esc($book['image']) ?>" alt="<?= esc($book['title']) ?>" width="100" class="img-thumbnail"></td>
                    <td><?= esc($book['title']) ?></td>
                    <td><?= esc($book['author']) ?></td>
                    <td><?= esc($book['description']) ?></td>
                    <td>$<?= esc($book['price']) ?></td>
                    <td>
                        <a href="<?= site_url('project/books/view/'.$book['id']) ?>" class="btn btn-danger btn-sm">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
