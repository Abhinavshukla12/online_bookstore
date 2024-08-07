<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('title') ?>About Us<?= $this->endSection() ?>

<?= $this->section('content') ?>
<body>
<br>
<div class="jumbotron">
    <p class="lead">Learn more about our online bookstore, our mission, vision, history, and team.</p>
</div>

<section class="my-3">
    <div class="row">
        <div class="col-md-4">
            <?php if (!empty($mission)): ?>
                <?php foreach ($mission as $item): ?>
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title text-black"><?= esc($item['title']) ?></h2>
                            <p class="card-text text-black"><?= esc($item['content']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <?php if (!empty($vision)): ?>
                <?php foreach ($vision as $item): ?>
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title text-black"><?= esc($item['title']) ?></h2>
                            <p class="card-text text-black"><?= esc($item['content']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <?php if (!empty($history)): ?>
                <?php foreach ($history as $item): ?>
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title text-black"><?= esc($item['title']) ?></h2>
                            <p class="card-text text-black"><?= esc($item['content']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<section id="team" class="my-3">
    <h3 class="text-black">Meet Our Team</h3>
    <div class="row">
        <?php foreach ($team as $item): ?>
            <div class="col-md-4 mb-3">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-black"><?= esc($item['title']) ?></h2>
                        <p class="card-text text-black"><?= esc($item['content']) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section id="contact" class="my-3">
    <h3 class="text-black">Contact Us</h3>
    <div class="row">
        <?php foreach ($contact as $item): ?>
            <?php if ($item['title'] == 'Email' || $item['title'] == 'Phone'): ?>
                <div class="col-md-6 mb-3">
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title text-black"><?= esc($item['title']) ?></h2>
                            <p class="card-text text-black"><?= esc($item['content']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>
</body>
<style>
    body{
        background-color: #7D8ABC;
    }
    .jumbotron{
        max-height: 80px;
        background-color: #FFF8DB;
        color: black;
        text-align: center;
        padding: 1.5rem 0.6rem;
        margin-bottom: 3rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        font-size: 1rem;
    }
</style>
<?= $this->endSection() ?>