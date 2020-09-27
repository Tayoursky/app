<?php
namespace controllers;

use models\Task;
use vendor\Controller;
use vendor\Pagination;

class TaskController extends Controller
{

    public function indexAction()
    {
        $title = 'Task Manager';
        $model = new Task();

        $total = 6;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $onPage = 1;
        $pagination = new Pagination($page, $onPage, $total);
        $start = $pagination->getStart();
        $tasks = $model->findAll(" id> 0 LIMIT $start, $onPage");
        //$res = $model->query("SELECT * FROM task;");
        //var_dump($task);

        $this->set(compact('title','tasks', 'pagination', 'total'));
    }

    public function createAction()
    {
        $title = 'Create task';

    }
}