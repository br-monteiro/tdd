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
        $arrLength = 0;

        foreach ($arr as $index => $value) {
            if ($callback($value, $index) === true) {
                $arrLength++;
            }
        }

        return $arrLength === 1;
    }

    public static function even(array $arr, callable $callback): bool
    {
        $arrLength = 0;
        $arrParamLength = count($arr);
        if ($arrParamLength === 0) {
            return false;
        }

        foreach ($arr as $index => $value) {
            if ($callback($value, $index) === true) {
                $arrLength++;
            }
        }

        return $arrLength === $arrParamLength;
    }
}
