<?php
namespace vendor;

class Model
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = Db::instance();
    }

    public function query($sql)
    {
        return $this->pdo->execute($sql);
    }

    public function countRow()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->count($sql);
    }

    public function findAllLimit($sort, $desc, $start, $onPage)
    {
        $str = "SELECT * FROM %s ORDER BY %s %s LIMIT %d, %d ;";
        $sql = sprintf($str, $this->table, $sort, $desc, $start, $onPage);
        return $this->pdo->query($sql);
    }

    public function findOne($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = ? LIMIT 1;";
        return $this->pdo->query($sql, [$id]);
    }

    public function create($name, $email, $textarea, $status)
    {
        $sql = "INSERT INTO {$this->table} (name, email, text, status) VALUES (?, ?, ?, ?)";
        $this->pdo->insert($sql, [$name, $email, $textarea, $status]);
    }

    public function update($name, $email, $textarea, $status, $id)
    {
        $sql = "UPDATE {$this->table} SET name = :name, email = :email, text = :textarea, status = :status WHERE id = :id;";
        $this->pdo->insert($sql, ['name' => $name, 'email' => $email, 'textarea' => $textarea, 'status' => $status, 'id' => $id]);

    }


}