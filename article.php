<?php

require_once __DIR__ . '/autoload.php';

if (!empty($_GET) && isset($_GET['id'])) {

    $article = \App\Models\Article::findById($_GET['id']);

    if (false !== $article) {
        \App\View::display('/Views/article.view.php', [
            'article' => $article
        ]);
    }
}