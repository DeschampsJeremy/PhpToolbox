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