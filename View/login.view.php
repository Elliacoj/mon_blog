<div class="formUser">
    <h2>Connexion</h2>
    <form action="/index.php?controller=user&action=login" method="POST">
        <div>
            <label for="mail">Adresse mail:</label>
            <input type="email" id="mail" name="mail" required>
        </div>
        <div>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <input type="submit" class="sendForm" value="Envoyer">
        </div>
    </form>
</div>