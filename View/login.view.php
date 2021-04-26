<div class="formUser">
    <h2>Connexion</h2>
    <form action="/index.php?controller=user&action=login" method="POST">
        <div>
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Mot de passe: <span>(doit contenir au moins un chiffre, une majuscule et un caractère spécifique)</span></label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <input type="submit" class="sendForm" value="Envoyer">
        </div>
    </form>
</div>