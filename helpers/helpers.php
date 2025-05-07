<?php

if (! function_exists('array_export')) {
    /**
     * var_export but with extra steps to remove traditional array displaying
     *
     * @see var_export()
     */
    function array_export(array $array, $indentationLevel = 0): string
    {
        $indent = str_repeat('    ', $indentationLevel); // Use 4 spaces for indentation
        $output = "[\n";
        $elements = [];
        foreach ($array as $key => $value) {
            $keyString = is_string($key) ? $indent."    '".addslashes($key)."' => " : $indent.'    ';
            if (is_array($value)) {
                $elements[] = $keyString.array_export($value, $indentationLevel + 1);
            } elseif (is_string($value)) {
                $elements[] = $keyString."'".addslashes($value)."'";
            } elseif (is_bool($value)) {
                $elements[] = $keyString.($value ? 'true' : 'false');
            } elseif (is_int($value) || is_float($value)) {
                $elements[] = $keyString.$value;
            } elseif (is_null($value)) {
                $elements[] = $keyString.'null';
            } else {
                $elements[] = $keyString.var_export($value, true);
            }
        }
        $output .= implode(",\n", $elements)."\n".$indent.']';

        return $output;
    }
}
