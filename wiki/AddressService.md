[Home page](/wiki)
# Methods on AddressService

- Import :
```
use DeschampsJeremy\AddressService;
```

### static function formatUse(?string $street, ?string $completed, ?string $code, ?string $city, ?string $country): string
Format address on : street+completed+code+city+country
```
var_dump([
    0 => AddressService::formatUse("10 rue de l'exemple", null, "3400", "Montpellier", "FRANCE"),
    1 => AddressService::formatUse("10 rue de l'exemple", "Impasse ABC", "3400", "Montpellier", "FRANCE"),
]);

array(2) {
    [0]=> string(43) "10+rue+de+l'exemple+3400+montpellier+france"
    [1]=> string(55) "10+rue+de+l'exemple+impasse+abc+3400+montpellier+france"
}
```

### static function formatShow(?string $street, ?string $completed, ?string $code, ?string $city, ?string $country): string
Format address on : Street - Completed - Code - City - Country
```
var_dump([
    0 => AddressService::formatShow("10 rue de l'exemple", null, "3400", "Montpellier", "FRANCE"),
    1 => AddressService::formatShow("10 rue de l'exemple", "Impasse ABC", "3400", "Montpellier", "FRANCE"),
]);

array(2) {
  [0]=> string(47) "10 rue de l'exemple - 3400 Montpellier - FRANCE"
  [1]=> string(61) "10 rue de l'exemple - Impasse ABC - 3400 Montpellier - FRANCE"
}
```

### static function formatUseFromOnestring(string $address): string
Format address one string format : street+completed+code+city+country
```
var_dump([
    0 => AddressService::formatUseFromOnestring("10 rue de l'exemple, 3400 Montpellier - FRANCE"),
]);

array(1) {
    [0]=> string(46) "10+rue+de+l+exemple++3400+montpellier+-+france"
}
```