<?php
namespace vendor;

use models\Task;

class Helper
{
    public static $statuses = [
        Task::STATUS_NEW => 'Новая',
        Task::STATUS_WAIT => 'Ожидается',
        Task::STATUS_DONE => 'Выполнено',
    ];

    public static function statusLabel($status)
    {
        switch ($status){
            case Task::STATUS_NEW:
                $class = 'label label-default';
                break;
            case Task::STATUS_WAIT:
                $class = 'label label-danger';
                break;
            case Task::STATUS_DONE:
                $class = 'label label-success';
                break;
            default:
                $class = 'label label-default';
        }

        return "<span class='$class'>" . self::$statuses[$status] . "</span>";
    }

}
