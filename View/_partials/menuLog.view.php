<div id="menu">
    <div id="time"></div>
    <a href="../../index.php"><button>Accueil</button></a>
    <div><img src="../../_doc/logo.png" alt="logo"></div>
    <div id="welcome">Bienvenue <?= $_SESSION['username'] ?></div>
    <a href="../../index.php?controller=user&action=logout"><button>Déconnexion</button></a>
</div>