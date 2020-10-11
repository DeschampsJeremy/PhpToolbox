<?php

namespace DeschampsJeremy;

class PhoneService
{

    /**
     * Format phone on : 33601020304
     * @return string|null
     */
    public static function formatUse(?int $phoneIndicative, ?string $phoneNumber): ?string
    {
        if (empty($phoneIndicative)) {
            $phoneIndicative = 33;
        }
        if (empty($phoneNumber)) {
            return null;
        }
        return $phoneIndicative . substr($phoneNumber, 1);
    }

    /**
     * Format phone on : (+33) 0601020304
     * @return string|null
     */
    public static function formatShow(?int $phoneIndicative, ?string $phoneNumber): ?string
    {
        if (empty($phoneIndicative)) {
            $phoneIndicative = 33;
        }
        if (empty($phoneNumber)) {
            return null;
        }
        return "(+" . $phoneIndicative . ") " . $phoneNumber;
    }
}
