<?php

namespace DeschampsJeremy;

class PriceService
{

    /**
     * Subtract a tax percentage on a price taxed
     * @return float
     */
    public static function getPriceUntax(float $priceTax, float $taxPercent): float
    {
        return round($priceTax / (1 + ($taxPercent / 100)), 2);
    }

    /**
     * Add a tax percentage on a price not taxed
     * @return float
     */
    public static function getPriceTax(float $priceUntax, float $taxPercent): float
    {
        return round($priceUntax + self::getCostTax($priceUntax, $taxPercent), 2);
    }

    /**
     * Rate a tax cost
     * @return float
     */
    public static function getCostTax(float $priceUntax, float $tax): float
    {
        $price = floatval($priceUntax);
        $tax = floatval($tax);
        return round($price * $tax / 100, 2);
    }
}
