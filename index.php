<?php

include_once('config.php');
include_once('models/debug.php');
include_once('models/db.php');
include_once('models/logging_restriction.php');

require_once('controllers/ctrl_vconn.php');

include_once('views/static/header.php');

if (isset($_GET['p']))
{
    switch ($_GET['p'])
    {
        case 'indice':
            REQUIRE_LOGGED_IN();

            require_once('controllers/ctrl_indice.php');
            require_once('views/indice.php');
            break;
        case 'jeu':
            REQUIRE_LOGGED_IN();

            //require_once('models/mdl_jeu.php');
            require_once('controllers/ctrl_jeu.php');

            if ($is_qcu)
                require_once('views/jeu_qcu.php');
            else
                require_once('views/jeu_strans.php');
            break;
        case 'pret':
            REQUIRE_LOGGED_IN();

            require_once('views/pret.php');
            break;
        case 'kill':
            session_destroy();
            header('Location: /');
            exit();
        case 'vi':
            REQUIRE_NOT_LOGGED_IN();

            require_once('controllers/ctrl_vinsc.php');
            require_once('views/vinsc.php');
            break;
        case 'connexion':
            REQUIRE_NOT_LOGGED_IN();

            include_once('views/connexion.php');
            break;
        case 'inscription':
            REQUIRE_NOT_LOGGED_IN();

            include_once('views/inscription.php');
            break;
        case 'indentification':
            REQUIRE_NOT_LOGGED_IN();

            include_once('views/indentification.php');
            break;
        default:
            header('Location: /');
            exit();
    }
}
else
{
    include_once('views/home.php');
}

include_once('views/static/footer.php');
