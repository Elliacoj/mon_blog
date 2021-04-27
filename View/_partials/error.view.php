<?php
if(isset($var['error'])) {
    if($var['error'] == 0) {
        ?>
        <div class="errorGreen">Votre compte a bien été créé</div>
        <?php
    }
    elseif($var['error'] == 1) {
        ?>
        <div class="errorRed">Le mot de passe ne respect pas le format requis</div>
        <?php
    }
    elseif($var['error'] == 2) {
        ?>
        <div class="errorRed">L'adresse mail est déjà utilisé</div>
        <?php
    }
    elseif($var['error'] == 3) {
        ?>
        <div class="errorRed">Une erreur c'est produite</div>
        <?php
    }
    elseif($var['error'] == 4) {
        ?>
        <div class="errorRed">Cette adresse mail n'existe pas</div>
        <?php
    }
    elseif($var['error'] == 5) {
        ?>
        <div class="errorRed">Mot de passe incorrect</div>
        <?php
    }
    elseif($var['error'] == 6) {
        ?>
        <div class="errorGreen">Article bien créé</div>
        <?php
    }
    elseif($var['error'] == 7) {
        ?>
        <div class="errorGreen">Article bien mis à jour</div>
        <?php
    }
    elseif($var['error'] == 8) {
        ?>
        <div class="errorGreen">Article bien supprimé</div>
        <?php
    }
}
