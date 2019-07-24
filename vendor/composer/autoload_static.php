<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit43de7322b11588ca92637282875a7a5f
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'aitsydney\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'aitsydney\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit43de7322b11588ca92637282875a7a5f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit43de7322b11588ca92637282875a7a5f::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit43de7322b11588ca92637282875a7a5f::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
