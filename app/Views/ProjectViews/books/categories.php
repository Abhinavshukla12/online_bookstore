<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('content') ?>

<h2>Categories</h2>

<?php if (!empty($categories)): ?>
    <ul class="list-group">
        <?php foreach ($categories as $category): ?>
            <li class="list-group-item">
                <a href="<?= site_url('project/category/' . $category['id']) ?>">
                    <?= esc($category['name']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No categories found.</p>
<?php endif; ?>

<?= $this->endSection() ?>
