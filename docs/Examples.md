# Examples

Parse content between html tags
```php
$pattern = new Flexic\Regex\Pattern(
    '<([ ]+)?(html)(.*?)>(.*)?<([ ]+)?\/(html)(.*?)>',
    Flexic\Regex\Modifier\MultiLine::class,
    Flexic\Regex\Modifier\SingleLine::class,
    Flexic\Regex\Modifier\Unicode::class,
);

$regex = new Flexic\Regex\Regex();

$subject = <<<HTML
<html>
    <head>
        <title>Example</title>
    </head>
    <body>
        <h1>Example</h1>
    </body>
</html>
HTML;

$result = $regex->match($pattern, $subject);

echo $result->get(2)->value(); // result: html (Start tag)
echo $result->get(4)->value(); // result: Content between start and end tag (head, body)
echo $result->get(6)->value(); // result: html (End tag)

```