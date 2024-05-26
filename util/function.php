<?php

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function sidebar_design($route)
{
    if(parse_url($_SERVER['REQUEST_URI'])['path'] === "/membershipsystem/index.php/" . $route){
        echo "text-gray-400 bg-indigo-700 text-indigo-100 rounded";
    }
}