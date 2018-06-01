<?php
namespace App\Helpers;

class Util
{
    public static function getIndexOfArrayMemeber($products, $field, $value)
    {
        foreach ($products as $key => $product) {
            if ($product[$field] === $value) {
                return (int) $key;
            }
        }
        return false;
    }
}
