<?php

const dbuser = ' :D ';
const dbpassword = ' :D ';
const dbip = '127.0.0.1';
const dbname = 'sae202';

/**
 * Generic containers :')
 */
class db_equipe
{
    public int      $id;
    public string   $tp;
    public string   $nom_equipe;
    public string   $mdp;
    public int      $score;
    public int      $progres;
    public array    $joueurs;
    private int     $last_index = 0;

    public function __construct(string $tp, string $nom_equipe, string $mdp, int $score, int $progres)
    {
        $this->tp = $tp;
        $this->nom_equipe = $nom_equipe;
        $this->mdp = $mdp;
        $this->score = $score;
        $this->progres = $progres;
    }

    public function pushFullName(string $_name)
    {
        if (empty($this->joueurs))
        {
            $this->joueurs = array_fill(0, 8, ' ');
        }

        $this->joueurs[$this->last_index++] = $_name;
    }
}

class db_quiz
{
    public int $id;
    public string $question;
    public string $indice;
    public string $bonnerep;
    public string $fausserep0;
    public string $fausserep1;
    public string $fausserep2;
    public string $image;
    public int $i_id;
}

/**
 * Handles db interactions.
 */
class DB
{
    private static $db;

    private static function _performConnection()
    {
        if (is_null(static::$db))
        {
            try
            {
                static::$db = new PDO('mysql:dbname=' . dbname . ';host=' . dbip . ';charset=utf8', dbuser, dbpassword, [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]);
            }
            catch (Exception $e)
            {
                die($e->getMessage());
            }
        }
    }

    /**
     * Get all equipes, false on failure.
     */
    public static function getAllEquipes(): array | bool
    {
        static::_performConnection();

        $query = 'SELECT * FROM equipes;';
        $pdo_statement = static::$db->prepare($query);

        $pdo_statement->execute();
        return $pdo_statement->fetch(PDO::FETCH_ASSOC);
    }

    private static function _checkForEquipeNameCollision(string $name)
    {
        static::_performConnection();

        $query = 'SELECT * FROM equipes WHERE `nom_equipe`=:nom;';
        $pdo_statement = static::$db->prepare($query);

        $pdo_statement->bindValue(':nom', $name, PDO::PARAM_STR);

        $pdo_statement->execute();
        $ret = $pdo_statement->fetch(PDO::FETCH_ASSOC);

        if (!$ret)
            return false;
        else
            return true;
    }

    private static function _getFreeParcourId(): int | bool
    {
        static::_performConnection();

        $query = 'SELECT * FROM parcours WHERE taken=0;';
        $pdo_statement = static::$db->prepare($query);

        $pdo_statement->execute();
        $ret = $pdo_statement->fetch(PDO::FETCH_ASSOC);

        if (!$ret)
        {
            return false;
        }
        else
        {
            $query = 'UPDATE parcours SET taken=1 WHERE id=:id;';
            $pdo_statement = static::$db->prepare($query);

            $pdo_statement->bindValue(':id', $ret['id'], PDO::PARAM_INT);

            $pdo_statement->execute();

            return $ret['id'];
        }
    }

    public static function registerEquipe(db_equipe $equipe): array | bool
    {
        static::_performConnection();

        if (static::_checkForEquipeNameCollision($equipe->nom_equipe))
        {
            return false;
        }

        if (!$parcour_id = static::_getFreeParcourId())
        {
            // INSTEAD: set random id [1; 16]
            return false;
        }

        $query = 'INSERT INTO equipes (`tp`, `nom_equipe`, `score`, `progres`, `mdp`, `joueur1`, `joueur2`, `joueur3`, `joueur4`, `joueur5`, `joueur6`, `joueur7`, `joueur8`, `parcours_id`) VALUES (:tp, :nom_equipe, :score, :progres, :mdp, :joueur1, :joueur2, :joueur3, :joueur4, :joueur5, :joueur6, :joueur7, :joueur8, :parcours_id);';
        $pdo_statement = static::$db->prepare($query);

        $pdo_statement->bindValue(':tp', $equipe->tp, PDO::PARAM_STR);
        $pdo_statement->bindValue(':nom_equipe', $equipe->nom_equipe, PDO::PARAM_STR);

        $pdo_statement->bindValue(':score', $equipe->score, PDO::PARAM_INT);
        $pdo_statement->bindValue(':progres', $equipe->progres, PDO::PARAM_INT);

        $pdo_statement->bindValue(':mdp', $equipe->mdp, PDO::PARAM_STR);

        for ($i = 1; $i <= 8; $i++)
        {
            $pdo_statement->bindValue(':joueur' . $i, $equipe->joueurs[$i - 1], PDO::PARAM_STR);
        }

        $pdo_statement->bindValue(':parcours_id', $parcour_id, PDO::PARAM_INT);

        return $pdo_statement->execute();
    }

    public static function tryLoginInfosMatch(string $name, string $pswd): int | bool
    {
        static::_performConnection();

        $query = 'SELECT * FROM equipes WHERE `nom_equipe`=:nom;';
        $pdo_statement = static::$db->prepare($query);

        $pdo_statement->bindValue(':nom', $name, PDO::PARAM_STR);

        $pdo_statement->execute();
        $ret = $pdo_statement->fetch(PDO::FETCH_ASSOC);

        if (!$ret)
        {
            return false;
        }
        else
        {
            if (password_verify($pswd, $ret['mdp']))
                return $ret['id'];
            else
                return false;
        }
    }

    public static function getUserInfo(int $id): array | bool
    {
        static::_performConnection();

        $query = 'SELECT id, nom_equipe, score, progres, parcours_id FROM equipes WHERE `id`=:id;';
        $pdo_statement = static::$db->prepare($query);

        $pdo_statement->bindValue(':id', $id, PDO::PARAM_INT);

        $pdo_statement->execute();
        $ret = $pdo_statement->fetch(PDO::FETCH_ASSOC);

        if (!$ret)
            return false;
        else
        {
            return $ret;
        }
    }

    public static function saveUserInfo(int $id, string $nom_equipe, int $score, int $progres, int $parcours_id): bool
    {
        static::_performConnection();

        $query = 'UPDATE equipes SET nom_equipe=:nom, score=:score, progres=:progres, parcours_id=:pid WHERE `id`=:id;';
        $pdo_statement = static::$db->prepare($query);

        $pdo_statement->bindValue(':id', $id, PDO::PARAM_INT);
        $pdo_statement->bindValue(':nom', $nom_equipe, PDO::PARAM_STR);
        $pdo_statement->bindValue(':score', $score, PDO::PARAM_INT);
        $pdo_statement->bindValue(':progres', $progres, PDO::PARAM_INT);
        $pdo_statement->bindValue(':pid', $parcours_id, PDO::PARAM_INT);

        return $pdo_statement->execute();
    }

    public static function getParcour(int $id): array | bool
    {
        static::_performConnection();

        $query = 'SELECT base, extra FROM parcours WHERE `id`=:id;';
        $pdo_statement = static::$db->prepare($query);

        $pdo_statement->bindValue(':id', $id, PDO::PARAM_INT);

        $pdo_statement->execute();
        $ret = $pdo_statement->fetch(PDO::FETCH_ASSOC);

        if (!$ret)
            return false;
        else
        {
            return $ret;
        }
    }

    public static function getQnA(int $i_id): array | bool
    {
        static::_performConnection();

        $query = 'SELECT * FROM quiz WHERE `i_id`=:id;';
        $pdo_statement = static::$db->prepare($query);

        $pdo_statement->bindValue(':id', $i_id, PDO::PARAM_INT);

        $pdo_statement->execute();
        $ret = $pdo_statement->fetch(PDO::FETCH_ASSOC);

        if (!$ret)
            return false;
        else
        {
            return $ret;
        }
    }
}
