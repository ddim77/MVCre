<?php

require_once __DIR__ . '/autoload.php';

//$db = new \App\Db();
//
//$users = $db->query("SELECT * from users", 'App\Models\User');

//$users = \App\Models\User::findAll();

$articles = \App\Models\Article::findAll();

//$article = \App\Models\Article::findById(7);

\App\View::display('/Views/articles.view.php', [
    'title' => 'Новости',
    'articles' => $articles
]);


$user = new \App\Models\User();
$user->name = 'Kokushka';
$user->email = 'bb@mail.com';
$user->insert();