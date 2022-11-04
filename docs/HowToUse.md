# How to use

The library can be used as non-static class or as static class.

#### Non-Static

```php
$regex = new Flexic\Regex\Regex();

$regex->match(...);
$regex->matchAll(...);
$regex->split(...);
$regex->grep(...);
$regex->filter(...);
$regex->replace(...);
```

#### Static

```php
Flexic\Regex\StaticRegex::match(...);
Flexic\Regex\StaticRegex::matchAll(...);
Flexic\Regex\StaticRegex::split(...);
Flexic\Regex\StaticRegex::grep(...);
Flexic\Regex\StaticRegex::filter(...);
Flexic\Regex\StaticRegex::replace(...);
```

### Methods

See [MethodSignatures.md](./MethodSignatures.md) for a list of all methods.

#### Pattern
All methods accept pattern as:
- object of class `Flexic\Regex\Pattern` (See [Pattern.md](./Pattern.md))
- object which implements `Flexic\Regex\PatternInterface` (As example libraries [predefined patterns](./PredefinedPattern.md))
- a string (As example `'/[a-z]/'`)

#### Flags
Every method accepts a flag list of types:
- Implemented flag classes (`Flexic\Regex\Flag\*\*`)
- `PREG_*` constants (Native PHP flags)

For native PHP PREG_* flags see [PHP Manual](https://www.php.net/manual/en/book.pcre.php)

Flags can be given as array or as multiple arguments.
```php
$regex->match(
    $pattern,
    $subject,
    $offset,
    [Flexic\Regex\Flag\Match\OffsetCapture, Flexic\Regex\Flag\Match\UnmatchedAsNull]
);

// or

$regex->match(
    $pattern,
    $subject,
    $offset,
    Flexic\Regex\Flag\Match\OffsetCapture,
    Flexic\Regex\Flag\Match\UnmatchedAsNull
);
```

---

### Available Flags

The following flags for methods are available:

Match:
- `Flexic\Regex\Flag\Match\OffsetCapture`: Capture offset of match. (`PREG_OFFSET_CAPTURE`)
- `Flexic\Regex\Flag\Match\UnmatchedAsNull`: Unmatched subpatterns are set to null. (`PREG_UNMATCHED_AS_NULL`)

MatchAll:
- `Flexic\Regex\Flag\MatchAll\OffsetCapture`: Capture offset of match. (`PREG_OFFSET_CAPTURE`)
- `Flexic\Regex\Flag\MatchAll\UnmatchedAsNull`: Unmatched subpatterns are set to null. (`PREG_UNMATCHED_AS_NULL`)
- `Flexic\Regex\Flag\MatchAll\PatternOrder`: Order results by pattern order. (`PREG_PATTERN_ORDER`)
- `Flexic\Regex\Flag\MatchAll\SetOrder`: Order results by set order. (`PREG_SET_ORDER`)

Split:
- `Flexic\Regex\Flag\Match\DelimCapture`: Capture delimiter for each match. (`PREG_SPLIT_DELIM_CAPTURE`)
- `Flexic\Regex\Flag\Match\NoEmpty`: Don't return empty pieces. (`PREG_SPLIT_NO_EMPTY`)
- `Flexic\Regex\Flag\Match\OffsetCapture`: Capture offset of match. (`PREG_OFFSET_CAPTURE`)

Grep:
- `Flexic\Regex\Flag\Grep\Invert`: Return all lines not matching the pattern. (`PREG_GREP_INVERT`)


### Result

The `match`, `matchAll`, `split` and `grep` methods return an object of type `Flexic\Regex\Result\MatchCollection`.
`filter` and `replace` returns native result as `string` or `array`. If no match is found, the methods return `null`.

#### MatchCollection & MatchItem
Whenever a list of matches be found they will be represented as `MatchCollection`.   
Single matches will be represented as `MatchItem`.
Based on the result types can be nested.

[`Flexic\Regex\Result\MatchCollection`](./../src/Result/MatchCollection.php)
- `hasMatches()` Returns true if matches are found.
- `count()` Returns the number of matches.
- `all()` Returns all matches as array. (If value is of type `MatchCollection` or `MatchItem` it will not be converted to array!)
- `first()` Returns the first match.
- `last()` Returns the last match.
- `get(int $index)` & `position(int $index)` Returns the match at the given index.
- `iterate(callback $callback)` Iterates over all matches and calls the callback with the match as argument.
- `map(callback $callback)` Iterates over all matches and calls the callback with the match as argument. Result of callback will be returned as array.
- `filter(callback $callback)` Iterates over all matches and calls the callback with the match as argument. If callback returns true, the match will be returned as array.
- `reduce(callback $callback, $initial = null)` Iterates over all matches and calls the callback with the match as argument. Result of callback will be returned as array.
- `walk(callback $callback)` Iterates over all matches and calls the callback with the match as argument. Result of callback will be returned as array.
- `between(int $start, int $end)` Returns a array with all matches between the given indexes.
- `asArray()` & `toArray()` Returns all matches as array. (If value is of type `MatchCollection` or `MatchItem` it will be converted to array)

[`Flexic\Regex\Result\MatchItem`](./../src/Result/MatchItem.php)
- `key()` returns the key of the match.
- `value()` returns the value of the match.