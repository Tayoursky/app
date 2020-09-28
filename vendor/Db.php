<?php
namespace vendor;

use PDOException;

class Db
{
    protected $pdo;
    protected static $instance;

    protected function __construct()
    {
        $db = require ROOT . '/config/db.php';
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        ];
        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'], $options);
    }

    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function execute($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute($params);
        if ($res !== false) {
            return $stmt->fetchAll();
        }
        return [];
    }

    public function count($sql)
    {
        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $stmt->rowCount();
    }

    public function insert($sql, $params = [])
    {

        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute($params);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}