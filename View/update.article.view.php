<h2>Article à modifier</h2>
<div class="articleForm">
    <form action="../index.php?controller=articles&action=update&article=<?= $var['article']->getId()?>" method="POST">
        <div>
            <label for="title">Titre de l'article:</label>
            <textarea name="title" id="title" required><?= $var['article']->getTitle()?></textarea>
        </div>

        <div>
            <label for="subTitle">Sous-titre de l'article:</label>
            <textarea name="subTitle" id="subTitle" required><?= $var['article']->getSubtitle()?></textarea>
        </div>

        <div>
            <label for="content">Contenu de l'article:</label>
            <textarea id="content" name="content" required><?= $var['article']->getContent()?></textarea>
        </div>

        <div>
            <label for="resume">Résumé:</label>
            <textarea id="resume" name="resume" required><?= $var['article']->getResume()?></textarea>
        </div>

        <div>
            <input type="submit" class="sendForm">
        </div>

        <div>
            <a href="../index.php?controller=articles&action=delete&article=<?= $var['article']->getId()?>" id="supButton"><input type="button" value="Supprimer" class="sendForm"></a>
        </div>
    </form>
</div>
