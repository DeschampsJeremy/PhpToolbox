<?php

namespace DeschampsJeremy;

use DateTime;
use Exception;

class SecurityService
{

    /**
     * Crypth a content to sha256
     * @return string
     */
    public static function sha256(string $content, string $secretKey = null): string
    {
        if ($secretKey) {
            return hash_hmac('sha256', $content, $secretKey);
        } else {
            return hash('sha256', $content);
        }
    }

    /**
     * Generate a token
     * @return string
     */
    public static function token(int $bitForce = 16): string
    {
        return bin2hex(random_bytes($bitForce));
    }

    /**
     * Get a JWT token
     * @return string
     */
    public static function jwtByUser(int $userId, string $secretKey, array $payloads = []): string
    {
        $payloads['id'] = $userId;
        $payloads['sub'] = (new DateTime())->getTimestamp();
        $header = json_encode(['alg' => 'sha256', 'typ' => 'JWT']);
        $payload = json_encode($payloads);
        $signature = hash_hmac('sha256', $header . $payload, $secretKey);
        return base64_encode($header) . "." . base64_encode($payload) . "." . $signature;
    }

    /**
     * Get a JWT content or null if empty
     * @return array|null
     */
    public static function userByJwt(string $jwt, string $secretKey): ?array
    {
        $parts = explode(".", $jwt);
        if (empty($parts[0]) || empty($parts[1]) || empty($parts[2])) {
            return null;
        }
        $header = base64_decode($parts[0]);
        $payload = base64_decode($parts[1]);
        $signatureTest = hash_hmac('sha256', $header . $payload, $secretKey);
        if ($signatureTest === $parts[2]) {
            return json_decode($payload, true);
        }
        return null;
    }
    
    /**
     * Get a JWT payload or null if empty
     * @return array|null
     */
    public static function payloadJwt(string $jwt): ?array
    {
        $parts = explode(".", $jwt);
        if (empty($parts[0]) || empty($parts[1])) {
            return null;
        }
        try {
            $stdClass = json_decode(base64_decode($parts[1]));
            $array = json_decode(json_encode($stdClass), true);
            return $array;
        } catch (Exception $e) {
            return null;
        }
    }
}
