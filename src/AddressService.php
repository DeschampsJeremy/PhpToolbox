<?php

namespace DeschampsJeremy;

class AddressService
{

    /**
     * Format address on : street+completed+code+city+country
     * @return string
     */
    public static function formatUse(?string $street, ?string $completed, ?string $code, ?string $city, ?string $country): string
    {
        $final = "";
        if (!empty($street)) {
            $final .= self::formatUseFromOnestring($street);
        }
        if (!empty($completed)) {
            $final .= "+" . self::formatUseFromOnestring($completed);
        }
        if (!empty($code)) {
            $final .= "+" . self::formatUseFromOnestring($code);
        }
        if (!empty($city)) {
            $final .= "+" . self::formatUseFromOnestring($city);
        }
        if (!empty($country)) {
            $final .= "+" . self::formatUseFromOnestring($country);
        }
        return $final;
    }

    /**
     * Format address on : Street - Completed - Code - City - Country
     * @return string
     */
    public static function formatShow(?string $street, ?string $completed, ?string $code, ?string $city, ?string $country): string
    {
        $final = "";
        if (!empty($street)) {
            $final .= $street;
        }
        if (!empty($completed)) {
            $final .= " - " . $completed;
        }
        if (!empty($code)) {
            $final .= " - " . $code;
        }
        if (!empty($city)) {
            $final .= " " . $city;
        }
        if (!empty($country)) {
            $final .= " - " . $country;
        }
        return $final;
    }

    /**
     * Format address one string format : street+completed+code+city+country
     * @return string
     */
    public static function formatUseFromOnestring(string $address): string
    {
        $useAddress = StringService::noAccent($address);
        $useAddress = strtolower($useAddress);
        $useAddress = str_replace(',', ' ', $useAddress);
        $useAddress = str_replace('\'', ' ', $useAddress);
        $useAddress = str_replace(' ', '+', $useAddress);
        return $useAddress;
    }
}
