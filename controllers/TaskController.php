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
        $sort = isset($_GET['sort']) ? (string)$_GET['sort'] : 'id';
        $desc = isset($_GET['desc']) ? (int)$_GET['desc'] : 0;
        (($desc > 0) ? $orderBy = 'DESC' : $orderBy = 'ASC');
        $pagination = new Pagination($page, $onPage = 2, $total);
        $start = $pagination->getStart();

        $tasks = $model->findAllLimit($sort, $orderBy, $start, $onPage);

        $this->set(compact('title','tasks', 'pagination', 'total', 'desc', 'sort'));
    }

    public function createAction()
    {
        $title = 'Create task';
        $model = new Task();
        if (isset($_POST) && !empty($_POST)) {
            $model->create($_POST['name'], $_POST['email'], $_POST['textarea'], (isset($_POST['status'])) ?: 0);
            header("Location: index");
        }
        $this->set(compact('title'));
    }

    public function updateAction()
    {
        $taskId = isset($_GET['task']) ? (int)$_GET['task'] : null;
        $title = 'Update task';
        $model = new Task();
        $form = $model->findOne($taskId);

        if (isset($_POST) && !empty($_POST)) {
            $model->update($_POST['name'], $_POST['email'], $_POST['textarea'], (isset($_POST['status'])) ?: 0, $_POST['id']);
            header("Location: index");
        }
        $this->set(compact('title', 'form'));
    }



}