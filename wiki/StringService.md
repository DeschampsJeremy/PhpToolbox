[Home page](/wiki)
# Methods on StringService

- Import :
```
use DeschampsJeremy\StringService;
```

### static noAccent(string $value): string
Replace accents
```
var_dump([
    0 => StringService::noAccent("Héllô ñÉw wörld"),
]);

array(1) {
  [0]=> string(15) "Hello nEw world"
}
```

### static truncateLastLine(string $value, int $limit = 5000): string
Truncate last line
```
var_dump([
    0 => StringService::truncateLastLine("Hello<br>Welcome<br>Bye", 10),
    1 => StringService::truncateLastLine("Hello<br>Welcome<br>Bye", 20),
]);

array(2) { 
  [0]=> string(5) "Hello" 
  [1]=> string(16) "Hello<br>Welcome" 
}
```