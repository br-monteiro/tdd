<?php
namespace App\Utils;

class IterableUtils
{

    public static function map(array $arr, callable $callback): array
    {
        $arrResult = [];

        foreach ($arr as $index => $value) {
            $arrResult[] = $callback($value, $index);
        }

        return $arrResult;
    }

    public static function find(array $arr, callable $callback)
    {
        foreach ($arr as $index => $value) {
            if ($callback($value, $index) === true) {
                return $value;
            }
        }

        return null;
    }

    public static function filter(array $arr, callable $callback): array
    {
        $arrResult = [];

        foreach ($arr as $index => $value) {
            if ($callback($value, $index) === true) {
                $arrResult[] = $value;
            }
        }

        return $arrResult;
    }

    public static function only(array $arr, callable $callback): bool
    {
        $arrResult = [];

        foreach ($arr as $index => $value) {
            if ($callback($value, $index) === true) {
                $arrResult[] = $index;
            }
        }

        return count($arrResult) === 1;
    }
}
