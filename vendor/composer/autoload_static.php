<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitde84c7279fc0b54ede0b04b4e5f7811e
{
    public static $prefixLengthsPsr4 = array (
        'b' => 
        array (
            'brteam\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'brteam\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitde84c7279fc0b54ede0b04b4e5f7811e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitde84c7279fc0b54ede0b04b4e5f7811e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitde84c7279fc0b54ede0b04b4e5f7811e::$classMap;

        }, null, ClassLoader::class);
    }
}
