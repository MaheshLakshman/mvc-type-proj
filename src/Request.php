<?php

namespace App;

class Request
{
    public function getUrl()
    {
        $full_url = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($full_url, '?');
        if($position === false)
        {
            return $full_url;
        }
        return substr($full_url, 0, $position);

    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);  
    }
}