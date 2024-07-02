<?= $this->extend('ProjectViews/layout/default') ?>

<?= $this->section('title') ?>About Us<?= $this->endSection() ?>

<?= $this->section('content') ?>
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
    <h3 class="text-primary">Meet Our Team</h3>
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
    <h3 class="text-primary">Contact Us</h3>
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

<style>
    /* Jumbotron Styling */
.jumbotron {
    background: linear-gradient(135deg, #ffcc00 0%, #ff9900 100%);
    color: #fff;
    text-align: center;
    padding: 3rem 2rem;
    margin-bottom: 3rem;
    border-radius: 0.5rem;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    font-size: 1rem;
}

/* Card Styling */
.card {
    transition: transform 0.3s, box-shadow 0.3s;
    border: none;
    border-radius: 0.5rem;
    overflow: hidden;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
}

/* Card Body */
.card-body {
    padding: 1.5rem;
    background-color: #f8f9fa;
    font-size: 0.9rem;
}

/* Card Title */
.card-title {
    font-size: 1.2rem;
    margin-bottom: 1rem;
    color: #333;
    font-weight: 600;
    text-align: center;
}

/* Card Text */
.card-text {
    font-size: 0.9rem;
    color: #555;
    text-align: justify;
}

/* Section Headings */
.text-primary {
    color: #007bff !important;
    font-size: 1.5rem;
    font-weight: 700;
    text-align: center;
    margin-bottom: 2rem;
}

/* Section Styling */
.my-3 {
    margin-top: 3rem !important;
    margin-bottom: 3rem !important;
}

/* Margin Bottom */
.mb-3 {
    margin-bottom: 1.5rem !important;
}

/* Shadow for Cards */
.shadow-sm {
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

/* Responsive Text Alignment */
@media (max-width: 768px) {
    .text-primary, .card-title, .card-text {
        text-align: center;
    }
}

/* Contact Section Specific */
#contact .card {
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
    color: #fff;
}

#contact .card-title, #contact .card-text {
    color: #fff;
}

#contact .card-title {
    font-size: 1.4rem;
}

#contact .card-text {
    font-size: 0.9rem;
}

</style>
<?= $this->endSection() ?>