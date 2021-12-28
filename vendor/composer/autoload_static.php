<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf0814e67f028a2381d019a7b943c75b7
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'EasyRdf\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'EasyRdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyrdf/easyrdf/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf0814e67f028a2381d019a7b943c75b7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf0814e67f028a2381d019a7b943c75b7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf0814e67f028a2381d019a7b943c75b7::$classMap;

        }, null, ClassLoader::class);
    }
}