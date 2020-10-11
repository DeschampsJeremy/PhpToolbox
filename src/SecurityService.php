<?php

namespace DeschampsJeremy;

class SecurityService
{

    /**
     * Crypth a content to sha256
     * @return string
     */
    public static function sha256(string $content): string
    {
        return hash('sha256', $content);
    }

    /**
     * Generate a token
     * @return string
     */
    public static function token(int $bitForce = 16): string
    {
        return bin2hex(random_bytes($bitForce));
    }
}
