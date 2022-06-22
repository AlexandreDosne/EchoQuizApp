<header>
    <a href="/?p=connexion" id="retour">RETOUR</a>
    <h1 class="h1-inscription">INSCRIPTION</h1>
    <div id="out-line-rose">
        <div id="line-rose"></div>
    </div>

    <div class="cercle-connexion">
        <div class="dot6"></div>
        <div class="dot7"></div>
        <div class="dot8"></div>
        <div class="zig"><img src="assets/img/zig.png"></div>
    </div>
</header>
<main>
    <form action="/?p=vi" method="post" autocomplete="off">
        <section id="formulaire">
            <div id="form">
                <input type="text" id="team-name" name="team-name" required minlength="3" maxlength="10" size="10" placeholder="Nom de l'équipe..." />
                <input type="text" id="tdg" name="tdg" required minlength="1" maxlength="1" size="1" placeholder="Groupe de TP" />
            </div>
            <div class="membre">
                <hook id="hook1">
                    <h2>MEMBRE <span class="hook_member_n">1</span> *</h2>
                    <div class="prenom-nom">
                        <input type="text" id="prenom1" name="prenom1" required minlength="3" maxlength="30" placeholder="Prénom..." />
                        <input type="text" id="nom1" name="nom1" required minlength="3" maxlength="30" placeholder="Nom..." />
                    </div>
                </hook>
                <hook id="hook2"></hook>
                <hook id="hook3"></hook>
                <hook id="hook4"></hook>
                <hook id="hook5"></hook>
                <hook id="hook6"></hook>
                <hook id="hook7"></hook>
                <hook id="hook8"></hook>
                <div class="membre-plus">
                    <div class="i_button" id="minus-boutton"><img src="assets/img/minus.png"></div>
                    <div class="i_button" id="plus-boutton"><img src="assets/img/plus.png"></div>
                </div>
                <div class="mdp-team">
                    <h2>MOT DE PASSE (4 chiffres)</h2>
                    <div id="mdp-team-form">
                        <input type="text" id="mdp" name="mdp" required minlength="4" maxlength="4" placeholder="0000" />
                    </div>
                </div>
            </div>
        </section>
</main>

<footer>
    <div class="cercle-footer">
        <div class="dot9"></div>
    </div>
    <input class="rainbow-button" type="submit" value="S'inscrire" />
    </form>
</footer>

<script src="/assets/js/form_inscription.min.js"></script>