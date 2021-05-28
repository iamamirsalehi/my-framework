<?php

function url($route)
{
    echo $_ENV['URL'] . $route;
}


function asset($asset)
{
    echo url('assets/' . $asset);
}

function config($key_value)
{
    $full_path = explode('.', $key_value);

    $file = include_once(realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . $full_path[0] . '.php'));

    return $file[$full_path[1]];
}

function view($path, $data = [])
{
    extract($data);

    $path = str_replace('.', DIRECTORY_SEPARATOR, $path);

    include_once(realpath('views' . DIRECTORY_SEPARATOR . $path . '.php'));
}
