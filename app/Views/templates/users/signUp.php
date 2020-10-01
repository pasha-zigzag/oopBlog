<?php include __DIR__ . '/../header.php'; ?>

    <form class="form-signin mt-5 mb-5 text-center" action="/users/register" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>

        <?php if (!empty($error)): ?>
            <div class="red mb-3"><?= $error ?></div>
        <?php endif; ?>

        <label for="inputName" class="sr-only">Имя</label>
        <input type="name" id="inputName" class="form-control" placeholder="Имя" autofocus name="nickname" value="<?= $_POST['nickname'] ?? '' ?>">
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="E-mail" name="email" value="<?= $_POST['email'] ?? '' ?>">
        <label for="inputPassword" class="sr-only">Пароль</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Пароль" name="password" value="<?= $_POST['password'] ?? '' ?>">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
        <a href="/users/login">Войти</a>

    </form>


<?php include __DIR__ . '/../footer.php'; ?>