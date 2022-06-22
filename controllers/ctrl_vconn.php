<?php
// Purpose: handle post from connection form.

$u_teamname = NULL;
$u_pswd = null;

if (isset($_POST['team-name']))
{
    if (!empty($_POST['team-name']))
    {
        $u_teamname = htmlentities($_POST['team-name']);
    }
}

if (isset($_POST['pswd']))
{
    if (!empty($_POST['pswd']))
    {
        $u_pswd = htmlentities($_POST['pswd']);
    }
}

if (!empty($u_teamname) && !empty($u_pswd))
{
    if (!$uid = DB::tryLoginInfosMatch($u_teamname, $u_pswd))
    {
        $_SESSION['vconn_error'] = true;
        header('Location: /?p=indentification');
        exit();
    }
    else
    {
        $u_info = DB::getUserInfo($uid);

        $_SESSION['user'] = [
            'id' => $u_info['id'],
            'nom_equipe' => $u_info['nom_equipe'],
            'score' => $u_info['score'],
            'progres' => $u_info['progres'],
            'parcours_id' => $u_info['parcours_id'],
            'parcour' => DB::getParcour($u_info['parcours_id']),
            'state' => 'jeu',
            'qcu_r' => -1,
            //'should_get_point' => false
        ];

        $_SESSION['user']['base'] = explode(';', $_SESSION["user"]['parcour']['base']);
        $_SESSION['user']['extra'] = explode(';', $_SESSION["user"]['parcour']['extra']);

        header('Location: /?p=pret');
        exit();
    }
}
