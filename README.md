# 🤘 Regex

This package provides a modern library for regular expressions.

## Installation

Run
```sh
composer require flexic/regex
```

# Usage

## Pattern

Library provides a object-oriented interface for regex pattern which can be converted to pattern string.

```php
$pattern = new Flexic\Regex\Pattern(
    '^[0-9]+$',
    Flexic\Regex\Modifier\SingleLine,
    Flexic\Regex\Modifier\MultiLine,
    Flexic\Regex\Modifier\Insensitive
);

// Results in pattern: /^[0-9]+$/smi
```

### Modifiers

The following modifiers for patterns are available:

- `Flexic\Regex\Modifier\Anchored`: Anchor to start of pattern, or at the end of the most recent match. (`A`)
- `Flexic\Regex\Modifier\DollarEndOnly`: $ matches only end of pattern. (`D`)
- `Flexic\Regex\Modifier\Extended`: Ignore whitespace. (`x`)
- `Flexic\Regex\Modifier\Extra`: [Any backslash in a pattern that is followed by a letter that has no special meaning causes an error, thus reserving these combinations for future expansion.](https://www.php.net/manual/en/reference.pcre.pattern.modifiers.php#PCRE_EXTRA) (`X`)
- `Flexic\Regex\Modifier\Insensitive`: Case insensitive match. (`i`)
- `Flexic\Regex\Modifier\Jchanged`: Allow duplicate subpattern names. (`J`)
- `Flexic\Regex\Modifier\MultiLine`: ^ and $ match start/end of line. (`m`)
- `Flexic\Regex\Modifier\Performant`: Enables extra performance for multiple analysis. (`S`)
- `Flexic\Regex\Modifier\SingleLine`: Dot matches newline. (`s`)
- `Flexic\Regex\Modifier\Ungreedy`: Make quantifiers lazy. (`U`)
- `Flexic\Regex\Modifier\Unicode`: Match with full unicode (`u`)

## Use Regex

The library can be used as non-static class or as static class.

### Non-Static

```php
$regex = new Flexic\Regex\Regex();

$regex->match(...);
$regex->matchAll(...);
$regex->split(...);
$regex->grep(...);
$regex->filter(...);
$regex->replace(...);
```

### Static

```php
Flexic\Regex\StaticRegex::match(...);
Flexic\Regex\StaticRegex::matchAll(...);
Flexic\Regex\StaticRegex::split(...);
Flexic\Regex\StaticRegex::grep(...);
Flexic\Regex\StaticRegex::filter(...);
Flexic\Regex\StaticRegex::replace(...);
```

### Methods


### Flags

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



----
### License
This package is licensed using the GNU License.

Please have a look at [LICENSE.md](LICENSE.md).

----

[![Donate](https://img.shields.io/badge/Donate-PayPal-blue.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=Q98R2QXXMTUF6&source=url)