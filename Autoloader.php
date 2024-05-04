<?php

class Autoloder {
    public static function loadClass($className) {
        $path = __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
        if(file_exists($path)) {
            include_once $path;
        }
    }

    public static function register() {
        spl_autoload_register([
            'Autoloder',
            'loadClass'
        ]);
    }
}

Autoloder::register();