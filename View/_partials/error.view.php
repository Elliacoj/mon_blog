<?php
if(isset($_GET['error'])) {
    if($_GET['error'] == 0) {
        ?>
        <div class="errorGreen">Votre compte a bien été créé</div>
        <?php
    }
    elseif($_GET['error'] == 1) {
        ?>
        <div class="errorRed">Le mot de passe ne respect pas le format requis</div>
        <?php
    }
    elseif($_GET['error'] == 1) {
        ?>
        <div class="errorRed">L'adresse mail est déjà utilisé</div>
        <?php
    }
}
