<?php

function deb_echo($obj)
{
    if (DEBUG_MODE)
    {
        echo($obj . '<br>');
    }
}

function deb_assert($obj)
{
    if (DEBUG_MODE)
    {
        ?>
            <script>
                alert('<?= $obj ?>');
            </script>
            <br>
        <?php
    }
}

function deb_dump($obj)
{
    if (DEBUG_MODE)
    {
        var_dump($obj);
    }
}