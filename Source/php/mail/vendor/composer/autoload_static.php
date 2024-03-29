<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit32e4109d23028e0a2cdddeaf42904790
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit32e4109d23028e0a2cdddeaf42904790::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit32e4109d23028e0a2cdddeaf42904790::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit32e4109d23028e0a2cdddeaf42904790::$classMap;

        }, null, ClassLoader::class);
    }
}
