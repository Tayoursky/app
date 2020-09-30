<?php
namespace models;

use vendor\Model;

class Task extends Model
{
    public $table = 'task';

    public function createTask($name, $email, $text, $status)
    {
        return $this->create($name, $email, $text, $status);
    }

    public function updateTask($name, $email, $text, $status, $id)
    {
        return $this->update($name, $email, $text, $status, $id);
    }

    public function findTasks($sort, $orderBy, $start, $onPage)
    {
        return $this->findAllLimit($sort, $orderBy, $start, $onPage);
    }
}