<header>
    <a href="/?p=connexion" id="retour">RETOUR</a>
    <h1 class="h1-inscription">CONNEXION</h1>
    <div id="out-line-rose">
        <div id="line-rose"></div>
    </div>
    <?php
    if (isset($_SESSION["vconn_error"]))
    {
    ?>
        <p>Identifiants incorrectes.</p>
    <?php
    }
    ?>

    <div class="cercle-connexion">
        <div class="dot10"></div>
        <div class="dot11"></div>
        <div class="dot12"></div>
        <div class="zig2"><img src="assets/img/zig.png"></div>
        <div class="dot13"></div>
    </div>
</header>
<main>
    <form action="/" method="POST" autocomplete="off">
        <section id="formulaire">
            <div id="form-identification-login">
                <h2>IDENTIFIANT :</h2>
                <div id="form">
                    <input type="text" id="team-name2" name="team-name" required minlength="3" maxlength="8" size="10" placeholder="Nom de l'équipe...">
                </div>
            </div>

            <div id="form-identification-groupe">
                <h2>MOT DE PASSE (4 chiffres) :</h2>
                <div id="form">
                    <input type="text" id="tdg2" name="pswd" required minlength="4" maxlength="4" size="4" placeholder="Mot de passe...">
                </div>
            </div>
        </section>
</main>

<footer>
    <input class="rainbow-button" type="submit" value="Se connecter">
    </form>
</footer>