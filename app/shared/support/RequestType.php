<?php

namespace app\shared\support;

class RequestType
{
    public static function get()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}
