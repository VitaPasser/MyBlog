<?php

function layout(string $path, string $title_name = '', string $indent = '')
{

    include $indent . 'Components/Header/Head.php';

    echo '<html><body>';

    include $indent . 'Components/Header/Header.php';
    include $path;
    include $indent . 'Components/Footer/Footer.php';

    echo '</body></html>';
}
