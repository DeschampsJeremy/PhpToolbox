[Home page](/wiki)
# Methods on DatetimeService

- Import :
```
use DeschampsJeremy\DatetimeService;
```

### static formatTimeFromFloat(float $val): string
Format hour digital to format hour:minutes
```
var_dump([
    0 => DatetimeService::formatTimeFromFloat(0),
    1 => DatetimeService::formatTimeFromFloat(8),
    2 => DatetimeService::formatTimeFromFloat(14.5),
]);

array(3) {
    [0]=> string(5) "00:00"
    [1]=> string(5) "08:00"
    [2]=> string(5) "14:30"
}
```

### static getMidnight(DateTime $datetime): DateTime
Get midnight to a datetime
```
var_dump([
    0 => DatetimeService::getMidnight(new DateTime('2020-01-01 12:00:00')),
    1 => DatetimeService::getMidnight(new DateTime('2020-01-01')),
]);

array(2) {
    [0]=> object(DateTime)#3404 (3) {
        ["date"]=> string(26) "2020-01-01 00:00:00.000000"
        ["timezone_type"]=> int(3)
        ["timezone"]=> string(3) "UTC"
    }
    [1]=> object(DateTime)#3587 (3) {
        ["date"]=> string(26) "2020-01-01 00:00:00.000000"
        ["timezone_type"]=> int(3)
        ["timezone"]=> string(3) "UTC"
    }
}
```

### static findAllDateBeetween(DateTime $datetimeStart, DateTime $datetimeStop): array
Find all dates beetween two date
```
var_dump([
    0 => DatetimeService::findAllDateBeetween(new DateTime('2020-01-01'), new DateTime('2020-01-05')),
]);

array(1) {
    [0]=> array(4) {
        [0]=> object(DateTime)#3588 (3) {
            ["date"]=> string(26) "2020-01-01 00:00:00.000000"
            ["timezone_type"]=> int(3)
            ["timezone"]=> string(3) "UTC"
        }
        [1]=> object(DateTime)#3581 (3) {
            ["date"]=> string(26) "2020-01-02 00:00:00.000000"
            ["timezone_type"]=> int(3)
            ["timezone"]=> string(3) "UTC"
        }
        [2]=> object(DateTime)#3591 (3) {
            ["date"]=> string(26) "2020-01-03 00:00:00.000000"
            ["timezone_type"]=> int(3)
            ["timezone"]=> string(3) "UTC"
        }
        [3]=> object(DateTime)#3589 (3) {
            ["date"]=> string(26) "2020-01-04 00:00:00.000000"
            ["timezone_type"]=> int(3)
            ["timezone"]=> string(3) "UTC"
        }
    }
}
```

### static findRangeBeetween(float $timeStart, float $timeStop, float $durationMinute): array
Find all availables durations ranges beetween two numerics hours
```
var_dump([
    0 => DatetimeService::findRangeBeetween(10.5, 14.5, 30),
    1 => DatetimeService::findRangeBeetween(10, 12, 60),
]);

array(2) {
    [0]=> array(8) {
        [0]=> float(10.5)
        [1]=> float(11)
        [2]=> float(11.5)
        [3]=> float(12)
        [4]=> float(12.5)
        [5]=> float(13)
        [6]=> float(13.5)
        [7]=> float(14)
    }
    [1]=> array(2) {
        [0]=> float(10)
        [1]=> float(11)
    }
}
```

### static isInclude(DateTime $datetimeStart, DateTime $datetimeStop, DateTime $datetime): bool
Check if datetime is include in two datetimes
```
var_dump([
    0 => DatetimeService::isInclude(new DateTime("2020-01-01"), new DateTime("2021-01-01"), new DateTime("2020-01-10")),
    1 => DatetimeService::isInclude(new DateTime("2020-01-01 12:00:00"), new DateTime("2020-01-01 14:00:00"), new DateTime("2020-01-01 12:00:00")),
    2 => DatetimeService::isInclude(new DateTime("2020-01-01 12:00:00"), new DateTime("2020-01-01 14:00:00"), new DateTime("2020-01-01 14:00:00")),
    3 => DatetimeService::isInclude(new DateTime("2020-01-01 12:00:00"), new DateTime("2020-01-01 14:00:00"), new DateTime("2020-01-01 13:00:00")),
]);

array(4) {
    [0]=> bool(true)
    [1]=> bool(false)
    [2]=> bool(false)
    [3]=> bool(true)
}
```

### static isIncludeRange(DateTime $datetimeStart, DateTime $datetimeStop, DateTime $datetimeRangeStart, DateTime $datetimeRangeStop): bool
Check if two datetimes is include in two datetimes
```
var_dump([
    0 => DatetimeService::isIncludeRange(new DateTime("2020-01-01"), new DateTime("2021-01-01"), new DateTime("2020-05-01"), new DateTime("2020-06-01")),
    1 => DatetimeService::isIncludeRange(new DateTime("2020-01-01"), new DateTime("2021-01-01"), new DateTime("2019-12-01"), new DateTime("2020-06-01")),
    2 => DatetimeService::isIncludeRange(new DateTime("2020-01-01"), new DateTime("2021-01-01"), new DateTime("2020-05-01"), new DateTime("2021-02-01")),
    3 => DatetimeService::isIncludeRange(new DateTime("2020-01-01"), new DateTime("2021-01-01"), new DateTime("2020-01-01"), new DateTime("2020-02-01")),
    4 => DatetimeService::isIncludeRange(new DateTime("2020-01-01"), new DateTime("2021-01-01"), new DateTime("2020-02-01"), new DateTime("2021-01-01")),
    5 => DatetimeService::isIncludeRange(new DateTime("2020-01-01"), new DateTime("2021-01-01"), new DateTime("2020-01-01"), new DateTime("2021-01-01")),
    6 => DatetimeService::isIncludeRange(new DateTime("2020-01-01"), new DateTime("2021-01-01"), new DateTime("2021-01-01"), new DateTime("2021-01-02")),
    7 => DatetimeService::isIncludeRange(new DateTime("2020-01-01"), new DateTime("2021-01-01"), new DateTime("2019-12-01"), new DateTime("2020-01-01")),
    8 => DatetimeService::isIncludeRange(new DateTime("2020-01-01 12:00:00"), new DateTime("2020-01-01 14:00:00"), new DateTime("2020-01-01 13:00:00"), new DateTime("2020-01-01 14:00:00")),
    9 => DatetimeService::isIncludeRange(new DateTime("2020-01-01 12:00:00"), new DateTime("2020-01-01 14:00:00"), new DateTime("2020-01-01 14:00:00"), new DateTime("2020-01-01 15:00:00")),
]);

array(9) {
    [0]=> bool(true)
    [1]=> bool(true)
    [2]=> bool(true)
    [3]=> bool(true)
    [4]=> bool(true)
    [5]=> bool(true)
    [6]=> bool(false)
    [7]=> bool(false)
    [8]=> bool(true)
    [9]=> bool(false)
}
```