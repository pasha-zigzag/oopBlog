<?php

namespace Controllers;

use Models\Articles\Article;

class MainController extends AbstractController {

    public function main()
    {
        $articles = Article::getAll();
        $this->view->renderHtml('main/main.php', [
            'articles' => $articles
        ]);
    }

}