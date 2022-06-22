<?php

function REQUIRE_LOGGED_IN()
{
    if (!isset($_SESSION["user"]))
    {
        header('Location: /');
        exit();
    }
}

function REQUIRE_NOT_LOGGED_IN()
{
    if (isset($_SESSION["user"]))
    {
        header('Location: /');
        exit();
    }
}