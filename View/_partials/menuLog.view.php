<div id="menu">
    <div id="time"></div>
    <div class="home">
        <a href="../../index.php"><button>Accueil</button></a>
        <a href="../../index.php?controller=articles&action=readAll"><button>Liste des articles</button></a>
    </div>

    <div><img src="../../_doc/logo.png" alt="logo"></div>


    <div class="home">
        <div id="welcome">Bienvenue <?= $_SESSION['username'] ?></div>
        <a href="../../index.php?controller=user&action=logout"><button>Logout</button></a>
    </div>

</div>