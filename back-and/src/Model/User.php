<?php
class User {
    // Simule une base de données en mémoire
    private static $users = [
        ['id' => 1, 'name' => 'Alice'],
        ['id' => 2, 'name' => 'Bob'],
    ];

    public static function getAll() {
        return self::$users;
    }

    public static function create($data) {
        $newUser = [
            'id' => count(self::$users) + 1,
            'name' => $data['name'] ?? 'SansNom',
        ];
        self::$users[] = $newUser;
        return $newUser;
    }
}