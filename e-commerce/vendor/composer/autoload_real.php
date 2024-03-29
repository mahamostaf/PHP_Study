<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitf227a6e1510fc21e4a4470b0a7141332
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

        spl_autoload_register(array('ComposerAutoloaderInitf227a6e1510fc21e4a4470b0a7141332', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitf227a6e1510fc21e4a4470b0a7141332', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitf227a6e1510fc21e4a4470b0a7141332::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
