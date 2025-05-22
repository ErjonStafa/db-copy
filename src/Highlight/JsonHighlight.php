<?php

namespace Erjon\DbCopy\Highlight;

class JsonHighlight
{
    /**
     * Check out the terminal highlighter by brzuchal/json-highlighter
     *
     * @link https://github.com/brzuchal/json-highlighter/tree/1.0
     */
    protected const COLOR_KEY = '#444444';

    protected const COLOR_STRING = '#880000';

    protected const COLOR_NUMBER = '#880000';

    protected const COLOR_BOOL = '#669955';

    protected const COLOR_NULL = '#669955';

    protected const COLOR_BRACKETS = '#444444';

    protected const COLOR_COLON = '#444444';

    protected const COLOR_COMMA = '#444444';

    const JSON_HIGHLIGHT_REGEX = '/(?<key>"[^"]*")\s*:\s*|(?<string>"[^"\\\\]*(?:\\\\.[^"\\\\]*)*")|(?<number>-?\d+(?:\.\d+)?)|\b(?<bool>true|false)\b|\b(?<null>null)\b|(?<brackets>[{}[\]])|(?<colon>:)|(?<comma>,)/';

    public static function highlight_string($json): string
    {
        return '<pre>'.
            preg_replace_callback(self::JSON_HIGHLIGHT_REGEX, self::replaceCallback(...), $json)
            .'</pre>';
    }

    protected static function replaceCallback(array $matches): string
    {
        if ($matches['key'] !== '') {
            return self::colorize($matches['key'], self::COLOR_KEY).self::colorize(': ', self::COLOR_COLON);
        }

        if ($matches['string'] !== '') {
            return self::colorize($matches['string'], self::COLOR_STRING);
        }

        if ($matches['number'] !== '') {
            return self::colorize($matches['number'], self::COLOR_NUMBER);
        }

        if ($matches['bool'] !== '') {
            return self::colorize($matches['bool'], self::COLOR_BOOL);
        }

        if ($matches['null'] !== '') {
            return self::colorize($matches['null'], self::COLOR_NULL);
        }

        if ($matches['brackets'] !== '') {
            return self::colorize($matches['brackets'], self::COLOR_BRACKETS);
        }

        if ($matches['colon'] !== '') {
            return self::colorize($matches['colon'], self::COLOR_COLON);
        }

        if ($matches['comma'] !== '') {
            return self::colorize($matches['comma'], self::COLOR_COMMA);
        }

        return $matches[0];
    }

    private static function colorize(string $text, string $color): string
    {
        return '<span style="color: '.$color.'">'.$text.'</span>';
    }
}
