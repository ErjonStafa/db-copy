<?php

if (! function_exists('array_export')) {
    /**
     * var_export but with extra steps to remove traditional array displaying
     * @link https://gist.github.com/Bogdaan/ffa287f77568fcbb4cffa0082e954022
     *
     * @see var_export()
     */
    function array_export(array $expression): string
    {
        $export = var_export($expression, true);
        $export = preg_replace('/^([ ]*)(.*)/m', '$1$1$2', $export);
        $array = preg_split("/\r\n|\n|\r/", $export);
        $array = preg_replace(["/\s*array\s\($/", "/\)(,)?$/", "/\s=>\s$/"], [null, ']$1', ' => ['], $array);

        return implode(PHP_EOL, array_filter(['['] + $array));
    }
}
