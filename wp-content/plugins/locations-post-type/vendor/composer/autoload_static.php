<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4a5664e0b5fbc0a956e4b312969ae513
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SCC\\' => 4,
        ),
        'N' => 
        array (
            'NanoSoup\\Nemesis\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SCC\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'NanoSoup\\Nemesis\\' => 
        array (
            0 => __DIR__ . '/..' . '/nanosoup/nemesis/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4a5664e0b5fbc0a956e4b312969ae513::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4a5664e0b5fbc0a956e4b312969ae513::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4a5664e0b5fbc0a956e4b312969ae513::$classMap;

        }, null, ClassLoader::class);
    }
}