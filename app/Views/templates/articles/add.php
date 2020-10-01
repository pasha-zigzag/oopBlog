<?php include __DIR__ . '/../header.php'; ?>

<div class="form-wrapper text-center">
    <form class="form-signin" enctype="multipart/form-data" action="/articles/add" method="POST">
        <h1 class="h3 mb-3 font-weight-normal">Создать статью</h1>

        <?php if (!empty($error)): ?>
            <div class="red mb-3"><?= $error ?></div>
        <?php endif; ?>

        <label for="inputName">Название статьи</label>
        <input type="text" id="inputName" class="form-control mb-2" placeholder="Название" value="<?= $_POST['name'] ?? '' ?>" name="name">
        <label for="text">Текст статьи</label>
        <textarea name="text" id="text" class="form-control mb-2" cols="30" rows="10" placeholder="Текст статьи"><?= $_POST['text'] ?? '' ?></textarea>
        <label for="text">Изображение статьи</label>
        <input type="file" name="img" class="mb-2">

        <button class="btn btn-lg btn-success btn-block" type="submit">Создать</button>
        <a href="/">Вернуться к списку</a>
    </form>
</div>

<?php include __DIR__ . '/../footer.php'; ?>