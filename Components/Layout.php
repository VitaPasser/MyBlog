<?php

function layout(string $path, string $indent = '')
{

    include $indent . 'Components/Header/Head.html';

    echo '<html><body>';

    include $indent . 'Components/Header/Header.php';
    include $path;
    include $indent . 'Components/Footer/Footer.php';

    echo '</body></html>';
}
