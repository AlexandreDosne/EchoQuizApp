<header>
    <?php
    if ($answered_right)
    {
    ?>
        <p id="retour">Bonne réponse : <br> +1 point</p>
    <?php
    }
    else
    {
    ?>
        <p id="retour">Mauvaise réponse : <br> +0 point</p>
    <?php
    }
    ?>
    <div class="question">
        <h1 class="h1-question">Indice</h1>
        <p class="p-question"><?= $indice ?></p>
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
    <div class="indice-scan">
        <p class="p-question">Scannez le QR code une fois sur place !</p>
    </div>
</main>
<footer>
    <div id="bRedirectContrainer" class="valider-boutton">
        <a href="#" class="rainbow-button" alt="Button">
            QUESTION SUIVANTE
        </a>
    </div>
    <div id="qr-reader" style="width: 80%"></div>
</footer>

<script src="assets/js/html5-qrcode.min.js"></script>
<script src="assets/js/indice_qr.min.js"></script>