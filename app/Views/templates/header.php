<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Мой блог</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                Мой блог
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <?php if(!empty($user)) : ?>
                    <div class="ml-auto">
                        Привет, <?= $user->getNickname() ?> |
                        <a href="/users/logout">Выйти</a>
                    </div>
                <?php else : ?>
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="/users/login">Войти</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/users/register">Регистрация</a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>