<?php

$answered_right = false;

$qna = DB::getQnA($_SESSION["user"]['base'][$_SESSION['user']['progres']]);
$indice = $qna['indice'];

if (!empty($_POST["form_validated"])) // && $_SESSION['user']['should_get_point'])
{
    if ($_POST["type"] == 'ans')
    {
        $answer = mb_strtolower(htmlentities($_POST['answer']));

        if ($answer == mb_strtolower($qna['bonnerep']))
        {
            $answered_right = true;
        }
    }
    else if ($_POST["type"] == 'qcu')
    {

        if (isset( $_POST['r' . $_SESSION['user']['qcu_r']] ))
        {
            if ($_POST['r' . $_SESSION['user']['qcu_r']] == 'on')
            {
                $answered_right = true;
            }
        }
    }

    if ($answered_right)
    {
        $_SESSION['user']['score']++;

        DB::saveUserInfo(
            $_SESSION['user']['id'],
            $_SESSION['user']['nom_equipe'],
            $_SESSION['user']['score'],
            $_SESSION['user']['progres'],
            $_SESSION['user']['parcours_id'],
        );
    }

    $_SESSION['user']['state'] = 'indice';
}

//$_SESSION['user']['should_get_point'] = false;
