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

        $total = $model->countRow();
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $pagination = new Pagination($page, $onPage = 2, $total);
        $start = $pagination->getStart();
        $limit = "LIMIT $start,$onPage";
        $tasks = $model->findAll($limit);

        $this->set(compact('title','tasks', 'pagination', 'total'));
    }

    public function createAction()
    {
        $title = 'Create task';
        $model = new Task();
        if (isset($_POST) && !empty($_POST)) {
            $model->create($_POST['name'], $_POST['email'], $_POST['textarea'], $_POST['status']);
        }


        $this->set(compact('title'));
    }

}