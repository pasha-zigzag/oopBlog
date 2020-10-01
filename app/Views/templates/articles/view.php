<?php include __DIR__ . '/../header.php'; ?>

<div class="container">

    <div class="posts-container px-3 mx-auto my-5">
        <div class="post">
            <h1 class="post-title fw-500"><?= $article->getName() ?></h1>
            <span class="post-date"><?= $article->getCreatedDate() ?></span>
            <p>Автор: <?= $article->getAuthor()->getNickname() ?></p>

            <p>
                <img src="<?= $article->getImg() ?>" class="img-fluid">
            </p>

            <p>
                <?= $article->getText() ?>
            </p>
            
            <p>
                Изменено: <?= $article->getLastEdit() ?>
            </p>

        </div>
    </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>