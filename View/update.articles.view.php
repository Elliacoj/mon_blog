<h1>Selection de l'article à modifier!</h1>

<?php

if(isset($var['articles'])) {
    foreach ($var['articles'] as $article) {?>
        <div class="articleDiv">
            <a href="../index.php?controller=articles&action=update&article=<?= $article->getId()?>">
                <div class="articleHome">
                    <h3><?= $article->getTitle()?></h3>
                    <p><?= $article->getResume()?></p>
                    <p><?= $article->getDate()?></p>
                </div>
            </a>
        </div>
<?php
    }
}