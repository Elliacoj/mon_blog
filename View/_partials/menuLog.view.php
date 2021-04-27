<div id="menu">
    <div id="time"></div>
    <div>
        <a href="../../index.php"><button>Accueil</button></a>
        <a href="../../index.php"><button>Liste des articles</button></a>
    </div>

    <div><img src="../../_doc/logo.png" alt="logo"></div>


    <div>
        <div id="welcome">Bienvenue <?= $_SESSION['username'] ?></div>
        <a href="../../index.php?controller=user&action=logout"><button>Déconnexion</button></a>
    </div>

</div>