<?php
/**
 * Created by PhpStorm.
 * User: aRosen_LN
 * Date: 03.06.2018
 * Time: 0:31
 */

namespace App\Components;

/**
 * Class UrlShortener.
 *
 * @package App\Components
 */
class UrlShortener
{
    /**
     * @var string
     */
    public static $alphabet = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * @param string $url
     * @return string
     */
    public static function generateShortUrl(string $url): string
    {
        $num    = crc32($url);
        $base   = \strlen(self::$alphabet); // 62
        $string = self::$alphabet[$num % $base];

        while (($num = (int)($num / $base)) > 0) {
            $string = self::$alphabet[$num % $base].$string;
        }

        return $string;
    }
}