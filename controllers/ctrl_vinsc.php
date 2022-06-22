<?php

if (!empty($_POST))
{
    $form_error = [];

    if (isset($_POST['team-name']))
    {
        if (!empty($_POST['team-name']))
        {
            if (strlen($_POST['team-name']) < 10)
            {
                $tp = htmlentities($_POST['tdg']);
            }
            else
            {
                $form_error['team-name'] = 'Le nom de l\'équipe est trop long (max 10 caractères)';
            }
        }
        else
        {
            $form_error['team-name'] = 'Un nom d\'équipe est requis';
        }
    }
    else
    {
        $form_error['team-name'] = 'Un nom d\'équipe est requis';
    }

    if (isset($_POST['tdg']))
    {
        if (!empty($_POST['tdg']))
        {
            if (strlen($_POST['tdg']) === 1)
            {
                $nom_equipe = htmlentities($_POST['team-name']);
            }
            else
            {
                $form_error['tdg'] = 'Groupe invalide (1 lettre)';
            }
        }
        else
        {
            $form_error['tdg'] = 'Groupe de tp requis';
        }
    }
    else
    {
        $form_error['tdg'] = 'Groupe de tp requis';
    }

    if (isset($_POST['mdp']))
    {
        if (!empty($_POST['mdp']))
        {
            if (strlen($_POST['mdp']) === 4)
            {
                $mdp = (int)$_POST['mdp'];

                if (gettype($mdp) === 'integer')
                {
                    $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
                }
                else
                {
                    $form_error['mdp'] = 'Le mot de passe doit être un nombre a 4 chiffres';
                }
            }
            else
            {
                $form_error['mdp'] = 'Le mot de passe doit être un nombre de 4 chiffres';
            }
        }
        else
        {
            $form_error['mdp'] = 'Le mot de passe est requis';
        }
    }
    else
    {
        $form_error['mdp'] = 'Le mot de passe est requis';
    }


    /*
    $nom_equipe = $_POST["team-name"];
    $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
    $score = 0;
    $progres = 0;
    $equipe = new db_equipe($tp, $nom_equipe, $mdp, $score, $progres);

*/


    // joueurs

    if (empty($form_error))
    {
        $score = 0;
        $progres = 0;
        $equipe = new db_equipe($tp, $nom_equipe, $mdp, $score, $progres);

        for ($i = 1; $i <= 8; $i++)
        {
            $fullname = '';

            if (isset($_POST['prenom' . $i]))
            {
                if (!empty($_POST['prenom' . $i]))
                {
                    $fullname .= htmlentities($_POST['prenom' . $i]);
                }
                else
                {
                    $form_error['prenom'] = 'Prenom requis';
                    break;
                }
            }

            if (isset($_POST['nom' . $i]))
            {
                if (!empty($_POST['nom' . $i]))
                {
                    $fullname .= ' ' . $_POST['nom' . $i];
                }
                else
                {
                    $form_error['nom'] = 'Nom requis';
                    break;
                }
            }

            if ($fullname != '')
            {
                $equipe->pushFullName($fullname);
            }
        }
    }

    if (empty($form_error))
    {
        if (!DB::registerEquipe($equipe))
        {
            deb_echo('Could not register equipe!');
        }
        else
        {
            header('Location: /?p=vi');
            exit();
        }
    }
}

