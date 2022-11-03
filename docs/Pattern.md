# Pattern

Library provides an object-oriented interface for regex pattern which will be automatically converted to pattern string by library.

```php
$pattern = new Flexic\Regex\Pattern(
    '^[0-9]+$',
    Flexic\Regex\Modifier\SingleLine,
    Flexic\Regex\Modifier\MultiLine,
    Flexic\Regex\Modifier\Insensitive
);

// Results in pattern string: /^[0-9]+$/smi
```

## Usage

The pattern should be provided as string without starting and ending delimiters.

Modifiers can be provided as following types:
- As modifier class (e.g. `Flexic\Regex\Modifier\Insensitive::class`)
- As modifier object (e.g. `new Flexic\Regex\Modifier\Insensitive()`)
- As modifier string (e.g. `'i'`)

## Available Modifiers

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