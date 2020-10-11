[Home page](/wiki)
# Methods on SecurityService

- Import :
```
use DeschampsJeremy\SecurityService;
```

### static sha256(string $content): string
Crypth a content to sha256
```
var_dump([
    0 => SecurityService::sha256("password"),
]);

array(1) {
  [0]=> string(64) "5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8"
}
```

### static token(int $bitForce = 16): string
Generate a token
```
var_dump([
    0 => SecurityService::token(),
    1 => SecurityService::token(32),
]);

array(2) {
  [0]=> string(32) "5880e744f95f1e393baa65767e70a2e2"
  [1]=> string(64) "48282636235b0bdae6e665a64b244548861cda2b5ff7ac190c472770e9f49d84"
}
```