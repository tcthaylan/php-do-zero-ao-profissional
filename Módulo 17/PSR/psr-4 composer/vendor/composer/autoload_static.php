<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9b7568d5739130581db4b5c9544bc2bc
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LojaB7Web\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LojaB7Web\\' => 
        array (
            0 => __DIR__ . '/../..' . '/class/LojaB7Web',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9b7568d5739130581db4b5c9544bc2bc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9b7568d5739130581db4b5c9544bc2bc::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
