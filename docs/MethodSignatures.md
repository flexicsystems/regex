# Method Signatures

## Match
```php
function match(
    PatternInterface|string $pattern,
    string $subject,
    int $offset = 0,
    array|MatchHandlerFlagInterface|int ...$flags,
): MatchCollection
```

## MatchAll
```php
function matchAll(
    PatternInterface|string $pattern,
    string $subject,
    int $offset = 0,
    array|MatchAllHandlerFlagInterface|int ...$flags,
): MatchCollection
```

## Split
```php
function split(
    PatternInterface|string $pattern,
    string $subject,
    int $limit = -1,
    array|SplitHandlerFlagInterface|int ...$flags,
): MatchCollection
```

## Grep
```php
grep(
    PatternInterface|string $pattern,
    array $input,
    array|GrepHandlerFlagInterface|int ...$flags,
): MatchCollection
```

## Filter
```php
function filter(
    PatternInterface|string|array $pattern,
    string|array $replacement,
    array|string $subject,
    int $limit = -1,
    ?int &$count = null,
): string|array|null
```

## Replace
```php
replace(
    PatternInterface|string|array $pattern,
    string|array $replacement,
    string|array $subject,
    int $limit = -1,
    ?int &$count = null,
): string|array|null
```