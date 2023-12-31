<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitaeb3e98236ff32c930ce73237ae019e4
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitaeb3e98236ff32c930ce73237ae019e4', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitaeb3e98236ff32c930ce73237ae019e4', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitaeb3e98236ff32c930ce73237ae019e4::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
