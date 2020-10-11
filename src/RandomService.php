<?php

namespace DeschampsJeremy;

use DateTime;

class RandomService
{

    /**
     * Select a random value in boolean
     * @return boolean
     */
    public static function isBoolean(): bool
    {
        return (random_int(0, 1));
    }

    /**
     * Select a random value in boolean by a % of chance to have true
     * @return boolean
     */
    public static function isTrueByPercentage(int $percentage): bool
    {
        return (random_int(1, 100) <= $percentage);
    }

    /**
     * Select a random index in array
     * @return int
     */
    public static function arrayIndex(array $array): ?int
    {
        return (!empty($array)) ? array_rand($array) : null;
    }

    /**
     * Select a random value in array
     * @return mixed
     */
    public static function arrayValue(array $array)
    {
        return (!empty($array)) ? $array[array_rand($array)] : null;
    }

    /**
     * Generate a random validation PIN code (min 2 number)
     * @return int
     */
    public static function pin(int $number = 4): int
    {
        $number = ($number < 2) ? 2 : $number;
        $min = "1";
        $max = "9";
        for ($i = 2; $i <= $number; $i++) {
            $min .= "0";
            $max .= "9";
        }
        return random_int(intval($min), intval($max));
    }

    /**
     * Generate a uniq id
     * @return string
     */
    public static function id(): string
    {
        return uniqid();
    }

    /**
     * Generate a password with (lower case, upper case and number), between 6 and 16 characters
     * @return string
     */
    public static function passwordMedium(): string
    {
        $password = self::numberInt(0, 9);
        $password .= self::charLower();
        $password .= self::charUpper();
        $numberCharPassword = random_int(6, 16);
        for ($i = strlen($password); $i <= $numberCharPassword; $i++) {
            switch (random_int(0, 2)) {
                case 0:
                    $password .= self::numberInt(0, 9);
                    break;
                case 1:
                    $password .= self::charLower();
                    break;
                default:
                    $password .= self::charUpper();
            }
        }
        return str_shuffle($password);
    }

    /**
     * Generate a password with (lower case, upper case, special char and number), between 8 and 16 characters
     * @return string
     */
    public static function passwordStrong(): string
    {
        $password = self::numberInt(0, 9);
        $password .= self::charLower();
        $password .= self::charUpper();
        $password .= self::charSpecial();
        $numberCharPassword = random_int(8, 16);
        for ($i = strlen($password); $i <= $numberCharPassword; $i++) {
            switch (random_int(0, 3)) {
                case "0":
                    $password .= self::numberInt(0, 9);
                    break;
                case "1":
                    $password .= self::charLower();
                    break;
                case "2":
                    $password .= self::charUpper();
                    break;
                default:
                    $password .= self::charSpecial();
            }
        }
        return str_shuffle($password);
    }

    /**
     * Find a random date between two datetime
     * @return Datetime
     */
    public static function date(Datetime $datetime1, Datetime $datetime2): Datetime
    {
        $tmp = 0;
        $min = strtotime($datetime1->format('Y-m-d H:i:s'));
        $max = strtotime($datetime2->format('Y-m-d H:i:s'));
        if ($max < $min) {
            $tmp = $min;
            $min = $max;
            $max = $tmp;
        }
        $val = rand($min, $max);
        return new Datetime(date('Y-m-d H:i:s', $val));
    }

    /**
     * Generate a random integer
     * @return int
     */
    public static function numberInt(int $min, int $max): int
    {
        return random_int($min, $max);
    }

    /**
     * Generate a random float between two includes values
     * @return float
     */
    public static function numberFloat(float $min, float $max): float
    {
        $min *= 100;
        $max *= 100;
        $return = (float) (random_int(intval($min), intval($max)));
        return $return / 100;
    }

    /**
     * Generate a random percentage
     * @return float
     */
    public static function numberPercentage(): float
    {
        return self::numberFloat(0, 100);
    }

    /**
     * Generate a random lower character
     * @return string
     */
    public static function charLower(): string
    {
        return (string) chr(random_int(97, 122));
    }

    /**
     * Generate a random upper character
     * @return string
     */
    public static function charUpper(): string
    {
        return (string) chr(random_int(65, 90));
    }

    /**
     * Generate a random special character
     * @return string
     */
    public static function charSpecial(): string
    {
        return (string) chr(random_int(33, 47));
    }

    /**
     * Generate a random url
     * @return string
     */
    public static function url(): string
    {
        return self::arrayValue(RandomData::URLS);
    }

    /**
     * Generate a random city
     * @return string
     */
    public static function city(): string
    {
        return self::arrayValue(RandomData::CITIES);
    }

    /**
     * Generate a random country
     * @return string
     */
    public static function country(): string
    {
        return self::arrayValue(RandomData::COUNTRIES);
    }

    /**
     * Generate a random firstname
     * @return string
     */
    public static function firstname(): string
    {
        return self::arrayValue(RandomData::FIRSTNAMES);
    }

    /**
     * Generate a random lastname
     * @return string
     */
    public static function lastname(): string
    {
        return self::arrayValue(RandomData::LASTNAMES);
    }

    /**
     * Generate a random host
     * @return string
     */
    public static function host(): string
    {
        return self::arrayValue(RandomData::HOSTS);
    }

    /**
     * Generate a random product
     * @return string
     */
    public static function product(): string
    {
        return self::arrayValue(RandomData::PRODUCTS);
    }

    /**
     * Generate a random service
     * @return string
     */
    public static function service(): string
    {
        return self::arrayValue(RandomData::SERVICES);
    }

    /**
     * Generate a random option
     * @return string
     */
    public static function option(): string
    {
        return self::arrayValue(RandomData::OPTIONS);
    }

    /**
     * Generate a random description
     * @return string
     */
    public static function description(int $maxParagraph): string
    {
        $numberParagraph = rand(1, $maxParagraph);
        $return = "";
        for ($i = 1; $i <= $numberParagraph; $i++) {
            if ($i === 1) {
                $return .= self::arrayValue(RandomData::DESCRIPTIONS);
            } else {
                $return .= "\n\n" . self::arrayValue(RandomData::DESCRIPTIONS);
            }
        }
        return $return;
    }

    /**
     * Generate a random title
     * @return string
     */
    public static function title(int $maxWord): string
    {
        $numberWord = rand(1, $maxWord);

        $return = "";
        for ($i = 1; $i <= $numberWord; $i++) {
            if ($i === 1) {
                $return .= ucfirst(self::arrayValue(RandomData::TITLES));
            } else {
                $return .= " " . self::arrayValue(RandomData::TITLES);
            }
        }
        return $return;
    }

    /**
     * Generate a random email
     * @return string
     */
    public static function email(): string
    {
        return strtolower(self::firstname() . "." . self::lastname() . "@" . self::host() . ".xxxxx");
    }

    /**
     * Generate a random phone
     * @return string
     */
    public static function phone(): string
    {
        return (string) ("0" . self::numberInt(100000000, 999999999));
    }

    /**
     * Generate a random address
     * @return string
     */
    public static function address(): string
    {
        return self::numberInt(1, 500) . " " . self::arrayValue(RandomData::ADDRESSS) . " " . self::firstname() . " " . self::lastname();
    }

    /**
     * Generate a random real location (street, completed, code, city, country)
     * @return array
     */
    public static function realLocation(): array
    {
        return self::arrayValue(RandomData::REAL_ADDRESSS);
    }
}
