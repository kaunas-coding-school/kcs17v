<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8ce2237dfbdaaca66da6a1b1b7dfa9ad
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
        'K' => 
        array (
            'KCS\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
        'KCS\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8ce2237dfbdaaca66da6a1b1b7dfa9ad::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8ce2237dfbdaaca66da6a1b1b7dfa9ad::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
