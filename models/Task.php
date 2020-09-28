<?php
namespace models;

use vendor\Model;

class Task extends Model
{
    public $table = 'task';

    public function orderBy($key)
    {
        if(!isset($key))
            $key = "id";

    }

}