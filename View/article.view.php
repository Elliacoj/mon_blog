
<div class="articleRead">
    <?php
    if(isset($var['article'])) {
        $article = $var['article'];

        if(count($var['comment']) != 0) {
            $comments = $var['comment'];
        }
    ?>
    <article>
        <h2><?= $article->getTitle() ?></h2>
        <h3><?= $article->getSubtitle() ?></h3>
        <p><?= $article->getContent() ?></p>
        <span><?= $article->getDate() ?></span>
    </article>

    <div id="comment">
        <h2>Zone des commentaires</h2>
        <form action="../index.php?controller=commentary&action=add&article=<?= $article->getId() ?>" method="POST">
            <textarea name="comment" placeholder="Ecrivez ici" required></textarea>
            <input type="submit">
        </form>
    <?php
        if(isset($comments)) {
            foreach ($comments as $comment) {
    ?>

        <div class="comment">
            <span><?= $comment->getDate() ?></span><span><b><?= $comment->getUserFk()->getUsername() ?>:</b></span><span class="commentText"><?= $comment->getContent() ?></span>
        <?php

            if((isset($_SESSION['role']) && $_SESSION['role'] === 'admin') || (isset($_SESSION['id']) && $_SESSION['id'] === $comment->getUserFk()->getId())) {?>
                <div class="buttonComment">
                    <a href="../index.php?controller=commentary&action=delete&article=<?= $article->getId() ?>&comment=<?= $comment->getId() ?>"><button>Sup</button></a>
                </div>
            <?php } ?>
        </div>
        <?php
            }
        }
        ?>
    </div>
    <?php
    } ?>
</div>