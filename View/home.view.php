<?php if(isset($_SESSION['role']) && $_SESSION['role'] = "Administrateur") {?>
        <div id="buttonAdmin">
            <a href="../index.php?controller=articles&action=new"><button>Nouvelle article</button></a>
            <a href=""><button>Modifier un article</button></a>
        </div>
<?php } ?>

<h1>Les derniers articles!</h1>

<?php
if(isset($var['articles'])) {
    foreach ($var['articles'] as $article) {?>
        <a href="">
            <div class="articleHome">
                <h3><?= $article->getTitle()?></h3>
                <p><?= $article->getResume()?></p>
                <p><?= $article->getDate()?></p>
            </div>
        </a>
<?php
    }
}
