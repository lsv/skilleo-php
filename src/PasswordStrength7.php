<?php

class PasswordStrength7
{

    const RETURN_FALSE = 'Invalid';
    const RETURN_TRUE = 'Valid';

    static public function test($input)
    {
        if (strlen($input) < 6) {
            return self::RETURN_FALSE;
        }

        if (preg_match('/\s/', $input)) {
            return self::RETURN_FALSE;
        }

        if (! preg_match('/[A-Z]/', $input)) {
            return self::RETURN_FALSE;
        }

        if (! preg_match('/[0-9]/', $input)) {
            return self::RETURN_FALSE;
        }

        if (! preg_match('/[$#\-_&]/', $input)) {
            return self::RETURN_FALSE;
        }

        return self::RETURN_TRUE;
    }

}