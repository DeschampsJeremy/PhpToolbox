[Home page](/wiki)
# Methods on PhoneService

- Import :
```
use DeschampsJeremy\PhoneService;
```

### static formatUse(?int $phoneIndicative, ?string $phoneNumber): ?string
Format phone on : 33601020304
```
var_dump([
    0 => PhoneService::formatUse(10, "0601020304"),
    1 => PhoneService::formatUse(null, "0601020304"),
]);

array(2) {
    [0]=> string(11) "10601020304"
    [1]=> string(11) "33601020304"
}
```

### static formatShow(?int $phoneIndicative, ?string $phoneNumber): ?string
Format phone on : (+33) 0601020304
```
var_dump([
    0 => PhoneService::formatShow(10, "0601020304"),
    1 => PhoneService::formatShow(null, "0601020304"),
]);

array(2) {
    [0]=> string(16) "(+10) 0601020304"
    [1]=> string(16) "(+33) 0601020304"
}
```