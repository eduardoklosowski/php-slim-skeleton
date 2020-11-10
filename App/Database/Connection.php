<?php

namespace App\Database;

class Connection
{
    private static string $reConf = '#mysql://' .
        '([0-9A-Za-z%-_.]+):([0-9A-Za-z%-_.]+)@' .
        '([0-9A-Za-z%-_.]+):([0-9]+)/' .
        '([0-9A-Za-z%-_.]+)([/?]?.*)#';
    private static ?\PDO $pdo = null;

    public static function connect(): \PDO
    {
        if (is_null(static::$pdo)) {
            if (preg_match_all(static::$reConf, $_ENV['DATABASE_URL'], $matches, PREG_UNMATCHED_AS_NULL) != 1) {
                die('Invalid DATABASE_URL');
            }

            $username = urldecode($matches[1][0]);
            $password = urldecode($matches[2][0]);
            $host = urldecode($matches[3][0]);
            $port = urldecode($matches[4][0]);
            $dbname = urldecode($matches[5][0]);

            static::$pdo = new \PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password, [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
            ]);
        }

        return static::$pdo;
    }
}
