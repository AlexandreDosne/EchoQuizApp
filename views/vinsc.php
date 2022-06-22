<?php
$error_occured = !empty($form_error);
?>

<header>
    <a href="/?p=connexion" id="retour">DEBUG: Retour</a>

    <?php 
        if (!$error_occured)
        {
    ?>
    <h1 class="h1-pret">Inscription <br> effectuée !</h1>
    <?php
        }
        else
        {
        ?>
            <h1 class="h1-pret">Inscription <br> pas effectuée !</h1>
        <?php
        }
        ?>
    <div class="cercle-connexion">
        <div class="dot18"></div>
        <div class="zig4"><img src="assets/img/zig.png"></div>
        <div class="dot19"></div>
        <div class="dot20"></div>
        <div class="zig5"><img src="assets/img/zig2.png"></div>
        <div class="dot21"></div>
    </div>
</header>
<main>
    <h2 class="h2-pret">Pour continuer connectez-vous</h2>
    <small><?= (isset($form_error['team-name']) ? $form_error['team-name'] : '') ?></small>
    <small><?= (isset($form_error['tdg']) ? $form_error['tdg'] : '') ?></small>
    <small><?= (isset($form_error['mdp']) ? $form_error['mdp'] : '') ?></small>
    <small><?= (isset($form_error['prenom1']) ? $form_error['prenom1'] : '') ?></small>
    <small><?= (isset($form_error['nom1']) ? $form_error['nom1'] : '') ?></small>
</main>
<footer>
    <?php
    if (!$error_occured)
    {
    ?>
        <a href="/?p=indentification" class="rainbow-button" alt="Button">
            SE CONNECTER
        </a>
    <?php
    }
    else
    {
    ?>
        <a href="/?p=inscription" class="rainbow-button" alt="Button">
            S'INSCRIRE
        </a>
    <?php
    }
    ?>
</footer>