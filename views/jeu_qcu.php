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
        <div class="container">
            <ul>
                <li>
                    <input type="radio" id="r1" name="r1">
                    <label for="r1"><?= $reponses[0] ?></label>

                    <div class="check"></div>
                </li>

                <li>
                    <input type="radio" id="r2" name="r2">
                    <label for="r2"><?= $reponses[1] ?></label>

                    <div class="check">
                        <div class="inside"></div>
                    </div>
                </li>

                <li>
                    <input type="radio" id="r3" name="r3">
                    <label for="r3"><?= $reponses[2] ?></label>

                    <div class="check">
                        <div class="inside"></div>
                    </div>
                </li>

                <li>
                    <input type="radio" id="r4" name="r4">
                    <label for="r4"><?= $reponses[3] ?></label>

                    <div class="check">
                        <div class="inside"></div>
                    </div>
                </li>
            </ul>
        </div>
</main>
<footer>
    <div class="valider-boutton2">
        <input type="hidden" id="form_validated" name="form_validated" value="1">
        <input type="hidden" id="type" name="type" value="qcu" />
        <input type="submit" class="rainbow-button" value="Valider">
        </form>
    </div>
</footer>