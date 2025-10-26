<?php

use Database;
// app/core/Container.php
class Container {
    private static $databaseInstance = null;

    /**
     * Helper untuk mendapatkan/membuat instance Database HANYA SEKALI.
     */
    private static function getDatabase() {
        // Jika kita belum pernah buat objek Database...
        if (self::$databaseInstance === null) {
            // ...maka kita buat sekarang.
            require_once '../app/core/Database.php';
            self::$databaseInstance = new Database(); 
        }
        // Kembalikan objek Database yang sudah ada (atau yang baru dibuat)
        return self::$databaseInstance;
    }
    public static function resolve($className) {
        
        $db = self::getDatabase();
        // Kamu bisa buat aturan manual di sini
        switch ($className) {
            case 'Auth':
                require_once '../app/services/AuthServices.php';
                $userRepository = new \App\repository\UserRepository($db);
                $authService = new \App\services\AuthServices($userRepository);
                return new Auth($authService);
            default:
                return new $className();
        }
    }
}
