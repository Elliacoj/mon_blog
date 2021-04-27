<h2>Nouvelle article</h2>
<div class="articleForm">
    <form action="../index.php?controller=articles&action=new" method="POST">
        <div>
            <label for="title">Titre de l'article:</label>
            <textarea name="title" id="title" required></textarea>
        </div>

        <div>
            <label for="subTitle">Sous-titre de l'article:</label>
            <textarea name="subTitle" id="subTitle" required></textarea>
        </div>

        <div>
            <label for="content">Contenu de l'article:</label>
            <textarea id="content" name="content" required></textarea>
        </div>

        <div>
            <label for="resume">Résumé:</label>
            <textarea id="resume" name="resume" required></textarea>
        </div>
        
        <div>
            <input type="submit" class="sendForm">
        </div>
    </form>
</div>