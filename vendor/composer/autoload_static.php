<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7e1e7412df2c7cbda6a613b1929cfabe
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7e1e7412df2c7cbda6a613b1929cfabe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7e1e7412df2c7cbda6a613b1929cfabe::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
