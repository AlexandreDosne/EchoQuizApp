    <header>
        <?php
        if (isset($_SESSION["user"]))
        {
        ?>
            <a href="/?p=kill" id="retour">DECONNEXION</a>
        <?php
        }
        ?>
        <div class="H-A-top">
            <div class="dot"></div>
            <h1 id="T1">A la recherche
                <br>
                de Big Canard
            </h1>
            <img id="BC" src="/assets/img/bigcanard.png">
            <div class="dot1"></div>

            <?php
            if (isset($_SESSION["user"]))
            {
            ?>
                <a href="/?p=<?= $_SESSION['user']['state'] ?>" class="rainbow-button" alt="Button">
                    <p>Reprendre le jeu</p>
                </a>
            <?php
            }
            ?>

            <a id="Moove" href="#P1">
                <div class="dot2">
                    <img id="FB" src="/assets/img/fb.png">
                </div>
            </a>
        </div>
    </header>
    <main>
        <div class="M-A-text">
            <p id="P1">Big Canard, notre mascotte MMI, est en danger.
                Zeus le pigeon, la mascotte des GEII, l’a kidnappé et
                le garde enfermé quelque part dans le bâtiment MMI.
                Votre mission, si vous l’acceptez, est de le sauver.
                Pour cela, vous allez devoir répondre à des questions
                tout en vous déplaçant dans le bâtiment H afin de procéder
                à son sauvetage. Vous accéderez aux questions par les QR codes
                cachés à l’intérieur des salles que vous parcourerez.
                <br>
                <br>
                Chaque question répondue vous donne accès à l’indice
                vous permettant d’accéder à la salle suivante,
                vous rapprochant peu à peu de Big Canard.
                Chaque bonne réponse vous apportera des points,
                l’équipe avec le plus de points se verra octroyer
                une récompense pour avoir sauvé Big Canard. Attention,
                Zeus a menacé de tuer en plus de Big Canard, les canetons qui dépasseront le temps imparti.
                Cependant, vous n’avez pas le droit de courir.
            </p>
        </div>
    </main>
    <footer>
        <?php
        if (!isset($_SESSION["user"]))
        {
        ?>
            <a href="/?p=connexion" class="rainbow-button" alt="Button">
                <p>Commencer</p>
            </a>
        <?php
        }
        ?>
    </footer>