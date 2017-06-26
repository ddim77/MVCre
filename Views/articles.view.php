<h1><?= $title ?></h1>

<ul>
    <?php foreach ($articles as $article) : ?>

        <li><a href="article.php?id=<?= $article->id ?>"><?= $article->title ?></a></li>

    <?php endforeach; ?>
</ul>
