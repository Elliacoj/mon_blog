
<div class="articleRead">
    <?php
    if(isset($var['article'])) {
        $article = $var['article'];
        ?>
            <article>
                <h2><?= $article->getTitle() ?></h2>
                <h3><?= $article->getSubtitle() ?></h3>
                <p><?= $article->getContent() ?></p>
                <span><?= $article->getDate() ?></span>
            </article>
        <?php
    } ?>
</div>