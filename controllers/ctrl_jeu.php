<?php

/*if ($_SESSION['user']['should_get_point'])
{
    header('Location: /?p=indice');
    exit();
}*/

// ATTENTION: NE PAS FAIRE FUITER
// Pourrait permettre d'accéder aux questions sans
// scanner les QR codes !
$keys = [str_split('abcdefghijklmnopqrsv')];

if (isset($_GET["vk"]))
{
    if (!empty($_GET["vk"]))
    {
        $vk = $_GET["vk"]; 

        if ($keys[ $_SESSION['user']['progres'] + 1 ] == $vk)
        {
            $_SESSION['user']['progres']++;

            DB::saveUserInfo(
                $_SESSION['user']['id'],
                $_SESSION['user']['nom_equipe'],
                $_SESSION['user']['score'],
                $_SESSION['user']['progres'],
                $_SESSION['user']['parcours_id'],
            );
        }else
        {
            header('Location: /?p=indice');
            exit();
        }
    }
    else
    {
        header('Location: /?p=jeu');
        exit();
    }
}

// $_SESSION['user']['progres'];
// $_SESSION['user']['parcours']['base'];

// question and answers
$qna = DB::getQnA($_SESSION["user"]['base'][$_SESSION['user']['progres']]);

$is_qcu = true;

if (empty($qna['fausserep0']))
    $is_qcu = false;

$question = $qna['question'];
$reponses = [
    $qna['bonnerep'],
    $qna['fausserep0'],
    $qna['fausserep1'],
    $qna['fausserep2'],
];

// merci PHP 😘
shuffle($reponses);

if ($is_qcu)
{
    $_SESSION['user']['qcu_r'] = array_search($qna['bonnerep'], $reponses) + 1;
}

//$_SESSION['user']['should_get_point'] = true;