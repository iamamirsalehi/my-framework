<?php

function url($route)
{
    echo $_ENV['URL'] . $route;
}


function asset($asset)
{
    echo url('assets/' . $asset);
}
