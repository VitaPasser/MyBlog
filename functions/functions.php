<?php

define('ROOT_PATH', dirname(__DIR__) . '/');

function coordinator(string $uri_place)
{
    if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
        $uri = 'https://';
    } else {
        $uri = 'http://';
    }
    $uri .= $_SERVER['HTTP_HOST'];
    header('Location: ' . $uri . '/WebProjects/MyBlog/' . $uri_place);
}

function coordinate(string $uri_place)
{
    if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
        $uri = 'https://';
    } else {
        $uri = 'http://';
    }
    $uri .= $_SERVER['HTTP_HOST'];
    return 'Location: ' . $uri . $uri_place;
}

function blobToImg(string $blob)
{
    $img = imagecreatefromstring($blob);
    ob_start();
    imagejpeg($img, null, 100);
    $rawImageBytes = ob_get_clean();

    return "src='data:image/png;base64," . base64_encode($rawImageBytes) . "'";
}
