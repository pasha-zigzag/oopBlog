<?php include __DIR__ . '/../header.php'; ?>

<div class="album py-5 bg-light">
    <div class="container">
        <?php if(!empty($user)) : ?>
            <a href="/articles/add" class="btn btn-success mb-5">Добавить статью</a>
        <?php endif; ?>

        <div class="row">

            <?php foreach ($articles as $article): ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card mb-4 shadow-sm">
                        <img src="<?= $article->getImg() ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?= $article->getName() ?></h5>
                            <p class="card-text"><?= $article->getText() ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="/articles/<?= $article->getId() ?>" class="btn btn-sm btn-outline-secondary">Открыть</a>

                                    <?php if(!empty($user)) : ?>
                                        <a href="/articles/<?= $article->getId() ?>/edit" class="btn btn-sm btn-outline-secondary">Изменить</a>
                                        <a href="/articles/<?= $article->getId() ?>/delete" class="btn btn-sm btn-outline-secondary">x</a>
                                    <?php endif; ?>
                                </div>
                                <small class="text-muted"><?= $article->getCreatedDate() ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            

        </div>
    </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>