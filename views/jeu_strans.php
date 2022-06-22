<header>
    <div class="question">
        <h1 class="h1-question">Question <?= $_SESSION['user']['progres'] + 1 ?> :</h1>
        <p class="p-question"><?= $question ?></p>
    </div>
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
    <form action="/?p=indice" method="POST" autocomplete="off">
        <div id="form">
            <input type="text" id="team-name" name="answer" required minlength="3" maxlength="25" size="10" placeholder="Réponse..." />
        </div>
</main>
<footer>
    <div class="valider-boutton">
        <input type="hidden" id="form_validated" name="form_validated" value="1" />
        <input type="hidden" id="type" name="type" value="ans" />
        <input type="submit" class="rainbow-button" value="Valider" />
    </div>
    </form>
</footer>
