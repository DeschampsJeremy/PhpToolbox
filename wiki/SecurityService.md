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
    1 => SecurityService::sha256("password", "my secret key"),
]);

array(1) {
  [0]=> string(64) "5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8",
  [1]=> string(64) "893a6501a77dd7ff0c964940ce363b213bbd0187cf1e5b7c5e8b522c10e82e07"
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

### static jwtByUser(int $userId, string $secretKey, array $payloads = []): string
Get a JWT token
```
var_dump([
    0 => SecurityService::jwtByUser(42, "my secret key"),
    1 => SecurityService::jwtByUser(42, "my secret key", ['role' => 5, 'email' => 'example@example.com']),
]);

array(2) { 
  [0]=> string(142) "eyJhbGciOiJzaGEyNTYiLCJ0eXAiOiJKV1QifQ==.eyJpZCI6NDIsInN1YiI6MTYwMjc0ODc3NH0=.d092e4f5b1b61815b91868d20dbd05e699dca737de58eaeaa2bf298b97e92266" 
  [1]=> string(194) "eyJhbGciOiJzaGEyNTYiLCJ0eXAiOiJKV1QifQ==.eyJyb2xlIjo1LCJlbWFpbCI6ImV4YW1wbGVAZXhhbXBsZS5jb20iLCJpZCI6NDIsInN1YiI6MTYwMjc0ODc3NH0=.6dd429121b7a95b21ada751b26834037b89583beabbb3f00df4d4367e9abed1a" 
}
```

### static userByJwt(string $jwt, string $secretKey): ?array
Get a JWT content or null if empty
```
var_dump([
    0 => SecurityService::userByJwt("eyJhbGciOiJzaGEyNTYiLCJ0eXAiOiJKV1QifQ==.eyJpZCI6NDIsInN1YiI6MTYwMjc0ODc3NH0=.d092e4f5b1b61815b91868d20dbd05e699dca737de58eaeaa2bf298b97e92266", "my secret key"),
    1 => SecurityService::userByJwt("MODIFY_TOKEN_eyJhbGciOiJzaGEyNTYiLCJ0eXAiOiJKV1QifQ==.eyJpZCI6NDIsInN1YiI6MTYwMjc0ODc3NH0=.d092e4f5b1b61815b91868d20dbd05e699dca737de58eaeaa2bf298b97e92266", "my secret key"),
]);

array(2) {
  [0]=> array(2) {
    ["sub"]=> int(42)
    ["iat"]=> int(1602748774)
  }
  [1]=> NULL
}
```

### static payloadJwt(string $jwt): ?array
Get a JWT payload or null if empty
```
var_dump([
    0 => SecurityService::payloadJwt("eyJhbGciOiJzaGEyNTYiLCJ0eXAiOiJKV1QifQ==.eyJpZCI6NDIsInN1YiI6MTYwMjc0ODc3NH0=.d092e4f5b1b61815b91868d20dbd05e699dca737de58eaeaa2bf298b97e92266_MODIFY_TOKEN"),
    1 => SecurityService::payloadJwt("eyJhbGciOiJzaGEyNTYiLCJ0eXAiOiJKV1QifQ"),
]);

array(2) {
  [0]=> array(2) {
    ["sub"]=> int(42)
    ["iat"]=> int(1602748774)
  }
  [1]=> NULL
}
```