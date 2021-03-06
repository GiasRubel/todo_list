<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite53de4e5486f22f1989c6745511cfbf5
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'App\\data\\Database' => __DIR__ . '/../..' . '/app/data/Database.php',
        'App\\data\\Job' => __DIR__ . '/../..' . '/app/data/Job.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite53de4e5486f22f1989c6745511cfbf5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite53de4e5486f22f1989c6745511cfbf5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite53de4e5486f22f1989c6745511cfbf5::$classMap;

        }, null, ClassLoader::class);
    }
}
