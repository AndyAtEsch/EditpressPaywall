<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit54ccc8157cacce36e2dde4b86a5b6af1
{
    public static $files = array (
        '7b11c4dc42b3b3023073cb14e519683c' => __DIR__ . '/..' . '/ralouphie/getallheaders/src/getallheaders.php',
        'c964ee0ededf28c96ebd9db5099ef910' => __DIR__ . '/..' . '/guzzlehttp/promises/src/functions_include.php',
        'a0edc8309cc5e1d60e3047b5df6b7052' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/functions_include.php',
        '37a3dc5111fe8f707ab4c132ef1dbc62' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/functions_include.php',
        '8dd32984d4cd58147cb41bf3844153c3' => __DIR__ . '/..' . '/chargebee/chargebee-php/lib/ChargeBee.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
        ),
        'M' => 
        array (
            'M1\\Env\\' => 7,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Psr7\\' => 16,
            'GuzzleHttp\\Promise\\' => 19,
            'GuzzleHttp\\' => 11,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
        'A' => 
        array (
            'Auth0\\SDK\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'M1\\Env\\' => 
        array (
            0 => __DIR__ . '/..' . '/m1/env/src',
        ),
        'GuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src',
        ),
        'GuzzleHttp\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/promises/src',
        ),
        'GuzzleHttp\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/guzzle/src',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
        'Auth0\\SDK\\' => 
        array (
            0 => __DIR__ . '/..' . '/auth0/auth0-php/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'j' => 
        array (
            'josegonzalez\\Dotenv' => 
            array (
                0 => __DIR__ . '/..' . '/josegonzalez/dotenv/src',
                1 => __DIR__ . '/..' . '/josegonzalez/dotenv/tests',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit54ccc8157cacce36e2dde4b86a5b6af1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit54ccc8157cacce36e2dde4b86a5b6af1::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit54ccc8157cacce36e2dde4b86a5b6af1::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
