[Home page](/wiki)
# Methods on PriceService

- Import :
```
use DeschampsJeremy\PriceService;
```

### static getPriceUntax(float $priceTax, float $taxPercent): float
Subtract a tax percentage on a price taxed
```
var_dump([
    0 => PriceService::getPriceUntax(10, 20),
    1 => PriceService::getPriceUntax(50, 5.5),
]);

array(2) {
    [0]=> float(8.33)
    [1]=> float(47.39)
}
```

### static getPriceTax(float $priceUntax, float $taxPercent): float
Add a tax percentage on a price not taxed
```
var_dump([
    0 => PriceService::getPriceTax(10, 20),
    1 => PriceService::getPriceTax(50, 5.5),
]);

array(2) {
  [0]=> float(12)
  [1]=> float(52.75)
}
```

### static getCostTax(float $priceUntax, float $tax): float
Rate a tax cost
```
var_dump([
    0 => PriceService::getCostTax(10, 20),
    1 => PriceService::getCostTax(50, 5.5),
]);

array(2) {
  [0]=> float(2)
  [1]=> float(2.75)
}
```