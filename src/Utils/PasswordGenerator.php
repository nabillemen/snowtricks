<?php

namespace Utils;

class PasswordGenerator
{
    function generate($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!?_&';
        $maxIndex = strlen($characters) - 1;
        $password = '';
        
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, $maxIndex)];
        }

        return $password;
    }
}
