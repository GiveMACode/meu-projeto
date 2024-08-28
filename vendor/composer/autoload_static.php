<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitda4e08285a8d082a35ccfe28e9042864
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
        'A' => 
        array (
            'App\\Models\\' => 11,
            'App\\Core\\' => 9,
            'App\\Controllers\\' => 16,
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
        'App\\Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Models',
        ),
        'App\\Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Core',
        ),
        'App\\Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Controllers',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitda4e08285a8d082a35ccfe28e9042864::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitda4e08285a8d082a35ccfe28e9042864::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitda4e08285a8d082a35ccfe28e9042864::$classMap;

        }, null, ClassLoader::class);
    }
}
