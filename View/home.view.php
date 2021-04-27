<?php if(isset($_SESSION['role']) && $_SESSION['role'] = "Administrateur") {?>
        <div id="buttonAdmin">
            <a href="../index.php?controller=articles&action=new"><button>Nouvelle article</button></a>
            <a href="../index.php?controller=articles&action=update"><button>Modifier un article</button></a>
        </div>
<?php }
if(isset($_GET['action']) && $_GET['action'] == "readAll") {
?>
<h1>Liste des articles!</h1>
<?php
}
else {
?>

<h1>Les derniers articles!</h1>

<?php
}

if(isset($var['articles'])) {
    foreach ($var['articles'] as $article) {?>
        <div class="articleDiv">
            <a href="../index.php?controller=articles&action=read&article=<?= $article->getId()?>">
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
