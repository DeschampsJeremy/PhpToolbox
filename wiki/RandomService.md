[Home page](/wiki)
# Methods on RandomService

- Import :
```
use DeschampsJeremy\RandomService;
```

### static isBoolean(): bool
Select a random value in boolean
```
var_dump([
    0 => RandomService::isBoolean(),
    1 => RandomService::isBoolean(),
    2 => RandomService::isBoolean(),
    3 => RandomService::isBoolean(),
]);

array(4) {
    [0]=> bool(true)
    [1]=> bool(false)
    [2]=> bool(true)
    [3]=> bool(false)
}
```

### static isTrueByPercentage(int $percentage): bool
Select a random value in boolean by a % of chance to have true
```
var_dump([
    0 => RandomService::isTrueByPercentage(100),
    1 => RandomService::isTrueByPercentage(70),
    2 => RandomService::isTrueByPercentage(40),
    3 => RandomService::isTrueByPercentage(10),
    4 => RandomService::isTrueByPercentage(0),
]);

array(5) {
    [0]=> bool(true)
    [1]=> bool(false)
    [2]=> bool(true)
    [3]=> bool(false)
    [4]=> bool(false)
}
```

### static arrayIndex(array $array): ?int
Select a random index in array
```
var_dump([
    0 => RandomService::arrayIndex(["ABC", "BCD", "CDE"]),
    1 => RandomService::arrayIndex([42, 36, 21]),
    2 => RandomService::arrayIndex([4.2, 10.4, 2.1]),
    3 => RandomService::arrayIndex([]),
]);

array(4) {
    [0]=> int(1)
    [1]=> int(2)
    [2]=> int(0)
    [3]=> NULL
}
```

### static arrayValue(array $array): mixed
Select a random value in array
```
var_dump([
    0 => RandomService::arrayValue(["ABC", "BCD", "CDE"]),
    1 => RandomService::arrayValue([42, 36, 21]),
    2 => RandomService::arrayValue([4.2, 10.4, 2.1]),
    3 => RandomService::arrayValue([]),
]);

array(4) {
    [0]=> string(3) "BCD"
    [1]=> int(21)
    [2]=> float(10.4)
    [3]=> NULL
}
```

### static pin(int $number = 4): int
Generate a random validation PIN code (min 2 number)
```
var_dump([
    0 => RandomService::pin(6),
    1 => RandomService::pin(4),
    2 => RandomService::pin(2),
    3 => RandomService::pin(0),
    4 => RandomService::pin(),
]);

array(5) {
    [0]=> int(384539)
    [1]=> int(9978)
    [2]=> int(43)
    [3]=> int(83)
    [4]=> int(1067)
}
```

### static id(): string
Generate a uniq id
```
var_dump([
    0 => RandomService::id(),
    1 => RandomService::id(),
]);

array(2) {
    [0]=> string(13) "5f7e5f1852a98"
    [1]=> string(13) "5f7e5f1852a9f"
}
```

### static passwordMedium(): string
Generate a password with (lower case, upper case and number), between 6 and 16 characters
```
var_dump([
    0 => RandomService::passwordMedium(),
    1 => RandomService::passwordMedium(),
]);

array(2) {
    [0]=> string(17) "64z3Fq681rfOF943B"
    [1]=> string(15) "iV64Iu5dAGi6Y6G"
}
```

### static passwordStrong(): string
Generate a password with (lower case, upper case, special char and number), between 8 and 16 characters
```
var_dump([
    0 => RandomService::passwordStrong(),
    1 => RandomService::passwordStrong(),
]);

array(2) {
    [0]=> string(15) "'8La*76mo"
    [1]=> string(12) "*!-2x0Au4U"
}
```

### static date(Datetime $datetime1, Datetime $datetime2): Datetime
Find a random date between two datetime
```
var_dump([
    0 => RandomService::date(new Datetime("2020-01-01"), new DateTime("2021-01-01")),
    1 => RandomService::date(new Datetime(), (new Datetime())->modify("+1 year")),
    2 => RandomService::date(new Datetime("2020-01-01 12:00:00"), new Datetime("2020-01-01 18:00:00")),
    3 => RandomService::date(new Datetime("2021-01-01"), new Datetime("2020-01-01")),
]);

array(4) {
  [0]=> object(DateTime)#3611 (3) {
    ["date"]=> string(26) "2020-12-12 20:37:49.000000"
    ["timezone_type"]=> int(3)
    ["timezone"]=> string(3) "UTC"
  }
  [1]=> object(DateTime)#3610 (3) {
    ["date"]=> string(26) "2021-05-10 15:33:28.000000"
    ["timezone_type"]=> int(3)
    ["timezone"]=> string(3) "UTC"
  }
  [2]=> object(DateTime)#3609 (3) {
    ["date"]=> string(26) "2020-01-01 12:12:25.000000"
    ["timezone_type"]=> int(3)
    ["timezone"]=> string(3) "UTC"
  }
  [3]=> object(DateTime)#3608 (3) {
    ["date"]=> string(26) "2020-05-17 15:58:17.000000"
    ["timezone_type"]=> int(3)
    ["timezone"]=> string(3) "UTC"
  }
}
```

### static numberInt(int $min, int $max): int
Generate a random integer
```
var_dump([
    0 => RandomService::numberInt(0, 100),
    1 => RandomService::numberInt(-10, 10),
]);

array(2) {
    [0]=> int(92)
    [1]=> int(8)
}
```

### static numberFloat(float $min, float $max): float
Generate a random float between two includes values
```
var_dump([
    0 => RandomService::numberFloat(0, 100),
    1 => RandomService::numberFloat(-10.5, 10.5),
]);

array(2) {
    [0]=> float(21.36)
    [1]=> float(9.19)
}
```

### static numberPercentage(): float
Generate a random percentage
```
var_dump([
    0 => RandomService::numberPercentage(),
    1 => RandomService::numberPercentage(),
]);

array(2) {
    [0]=> float(19.73)
    [1]=> float(14)
}
```

### static charLower(): string
Generate a random lower character
```
var_dump([
    0 => RandomService::charLower(),
    1 => RandomService::charLower(),
]);

array(2) {
    [0]=> string(1) "d"
    [1]=> string(1) "k"
}
```

### static charUpper(): string
Generate a random upper character
```
var_dump([
    0 => RandomService::charUpper(),
    1 => RandomService::charUpper(),
]);

array(2) {
    [0]=> string(1) "H"
    [1]=> string(1) "E"
}
```

### static charSpecial(): string
Generate a random special character
```
var_dump([
    0 => RandomService::charSpecial(),
    1 => RandomService::charSpecial(),
]);

array(2) {
    [0]=> string(1) "+"
    [1]=> string(1) "!"
}
```

### static url(): string
Generate a random url
```
var_dump([
    0 => RandomService::url(),
    1 => RandomService::url(),
]);

array(2) {
    [0]=> string(25) "https://www.facebook.com/"
    [1]=> string(24) "https://www.youtube.com/"
}
```

### static city(): string
Generate a random city
```
var_dump([
    0 => RandomService::city(),
    1 => RandomService::city(),
]);

array(2) {
    [0]=> string(9) "Marseille"
    [1]=> string(6) "Toulon"
}
```

### static country(): string
Generate a random country
```
var_dump([
    0 => RandomService::country(),
    1 => RandomService::country(),
]);

array(2) {
    [0]=> string(7) "Espagne"
    [1]=> string(6) "Italie"
}
```

### static firstname(): string
Generate a random firstname
```
var_dump([
    0 => RandomService::firstname(),
    1 => RandomService::firstname(),
]);

array(2) {
    [0]=> string(5) "Clara"
    [1]=> string(6) "Joanna"
}
```

### static lastname(): string
Generate a random lastname
```
var_dump([
    0 => RandomService::lastname(),
    1 => RandomService::lastname(),
]);

array(2) {
    [0]=> string(6) "Astier"
    [1]=> string(8) "Dupontel"
}
```

### static host(): string
Generate a random host
```
var_dump([
    0 => RandomService::host(),
    1 => RandomService::host(),
]);

array(2) {
    [0]=> string(5) "Yahoo"
    [1]=> string(7) "Hotmail"
}
```

### static product(): string
Generate a random product
```
var_dump([
    0 => RandomService::product(),
    1 => RandomService::product(),
]);

array(2) {
    [0]=> string(5) "Yahoo"
    [1]=> string(7) "Hotmail"
}
```

### static service(): string
Generate a random service
```
var_dump([
    0 => RandomService::service(),
    1 => RandomService::service(),
]);

array(2) {
    [0]=> string(14) "Soin du visage"
    [1]=> string(13) "Soin du corps"
}
```

### static option(): string
Generate a random option
```
var_dump([
    0 => RandomService::option(),
    1 => RandomService::option(),
]);

array(2) {
    [0]=> string(14) "Soin du visage"
    [1]=> string(13) "Soin du corps"
}
```

### static description(int $maxParagraph): string
Generate a random description
```
var_dump([
    0 => RandomService::description(1),
    1 => RandomService::description(2),
]);

array(2) {
    [0]=> string(419) "Post hoc impie perpetratum quod in aliis quoque iam timebatur, tamquam licentia crudelitati indulta per suspicionum nebulas aestimati quidam noxii damnabantur. quorum pars necati, alii puniti bonorum multatione actique laribus suis extorres nullo sibi relicto praeter querelas et lacrimas, stipe conlaticia victitabant, et civili iustoque imperio ad voluntatem converso cruentam, claudebantur opulentae domus et clarae."
    [1]=> string(1520) "Nec vox accusatoris ulla licet subditicii in his malorum quaerebatur acervis ut saltem specie tenus crimina praescriptis legum committerentur, quod aliquotiens fecere principes saevi: sed quicquid Caesaris implacabilitati sedisset, id velut fas iusque perpensum confestim urgebatur impleri.

    Et interdum acciderat, ut siquid in penetrali secreto nullo citerioris vitae ministro praesente paterfamilias uxori susurrasset in aurem, velut Amphiarao referente aut Marcio, quondam vatibus inclitis, postridie disceret imperator. ideoque etiam parietes arcanorum soli conscii timebantur."
}
```

### static title(int $maxWord): string
Generate a random title
```
var_dump([
    0 => RandomService::title(1),
    1 => RandomService::title(5),
]);

array(2) {
    [0]=> string(9) "Diritatis"
    [1]=> string(24) "Siquid virtutem indicium"
}
```

### static email(): string
Generate a random email
```
var_dump([
    0 => RandomService::email(),
    1 => RandomService::email(),
]);

array(2) {
  [0]=> string(23) "lucas.lucio@yahoo.xxxxx"
  [1]=> string(27) "joanna.combes@hotmail.xxxxx"
}
```

### static phone(): string
Generate a random phone
```
var_dump([
    0 => RandomService::phone(),
    1 => RandomService::phone(),
]);

array(2) {
    [0]=> string(10) "0613066986"
    [1]=> string(10) "0566908081"
}
```

### static address(): string
Generate a random address
```
var_dump([
    0 => RandomService::address(),
    1 => RandomService::address(),
]);

array(2) {
    [0]=> string(25) "313 place Joanna Dupontel"
    [1]=> string(23) "357 impasse Valerie Doe"
}
```

### static realLocation(): array
Generate a random real location (street, completed, code, city, country)
```
var_dump([
    0 => RandomService::realLocation(),
    1 => RandomService::realLocation(),
]);

array(2) {
    [0]=> array(7) {
        ["lat"]=> string(11) "43.65936261"
        ["lng"]=> string(8) "6.925450"
        ["street"]=> string(23) "9 Rue Vieille Boucherie"
        ["completed"]=> string(0) ""
        ["code"]=> string(5) "06130"
        ["city"]=> string(6) "Grasse"
        ["country"]=> string(6) "France"
    }
    [1]=> array(7) {
        ["lat"]=> string(9) "45.830661"
        ["lng"]=> string(8) "1.248156"
        ["street"]=> string(21) "12 Rue Armand Dutreix"
        ["completed"]=> string(0) ""
        ["code"]=> string(5) "87000"
        ["city"]=> string(7) "Limoges"
        ["country"]=> string(6) "France"
    }
}
```