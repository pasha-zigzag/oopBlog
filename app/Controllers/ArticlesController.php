<?php

namespace Controllers;

use Exceptions\NotFoundException;
use Exceptions\UnauthorizedException;
use Exceptions\InvalidArgumentException;
use Models\Articles\Article;
use Models\Users\User;

class ArticlesController extends AbstractController {

    public function view(int $articleId) {
        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();
        }
    
        $this->view->renderHtml('articles/view.php', [
            'article' => $article
        ]);
    }

    public function add() {
        if ($this->user === null) {
            throw new UnauthorizedException();
        }
    
        if (!empty($_POST)) {
            try {
                $fields = array_merge($_POST, $_FILES);
                $article = Article::createFromArray($fields, $this->user);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/add.php', ['error' => $e->getMessage()]);
                return;
            }
    
            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }
    
        $this->view->renderHtml('articles/add.php');
    }

    public function edit(int $articleId) {
        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();
        }

        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!empty($_POST)) {
            try {
                $fields = array_merge($_POST, $_FILES);
                $article->updateFromArray($fields);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/edit.php', ['error' => $e->getMessage(), 'article' => $article]);
                return;
            }

            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }

        $this->view->renderHtml('articles/edit.php', ['article' => $article]);
    }

    public function delete(int $articleId) {
        $article = Article::getById($articleId);

        if ($article === null) {
            echo ' Статьи с таким id не существует';
            return;
        }

        $article->delete();
        header('Location: /');
        exit();
    }
}