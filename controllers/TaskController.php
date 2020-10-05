<?php
namespace controllers;

use models\Task;
use models\User;
use vendor\Controller;
use vendor\Pagination;

class TaskController extends Controller
{

    public function indexAction()
    {
        $title = 'Task Manager';

        $model = new Task();

        $total = $model->countRow();
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $sort = isset($_GET['sort']) ? $this->clean($_GET['sort']) : 'id';
        $desc = isset($_GET['desc']) ? intval($_GET['desc']) : 0;
        (($desc > 0) ? $orderBy = 'DESC' : $orderBy = 'ASC');

        $pagination = new Pagination($page, $onPage = 3, $total);
        $start = $pagination->getStart();

        $tasks = $model->findTasks($sort, $orderBy, $start, $onPage);

        $this->set(compact('title','tasks', 'pagination', 'total', 'desc', 'sort'));
    }

    public function createAction()
    {
        $title = 'Create task';
        $model = new Task();
        if (isset($_POST) && !empty($_POST)) {
            $name = $this->clean($_POST['name']);
            $email = $this->clean($_POST['email']);
            $text = $this->clean($_POST['textarea']);
            $status = (isset($_POST['status']) ? intval($_POST['status']) : 0);

            if ($task = $model->createTask($name, $email, $text, $status))
                $_SESSION['success'] = 'Задача успешно сохранена.';

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
        if ($form) {
            $_SESSION['textarea'] = $form[0]['text'];
        }


        if (isset($_POST) && !empty($_POST)) {
            $id = intval($_POST['id']);
            $name = $this->clean($_POST['name']);
            $email = $this->clean($_POST['email']);
            $status = (isset($_POST['status']) ? intval($_POST['status']) : 0);



            if (isset($_POST['textarea']) && ($_SESSION['textarea'] != $_POST['textarea'])){
                $text = $this->clean($_POST['textarea']);
                $text .= " (Отредактировано администратором).";
                unset($_SESSION['textarea']);
            } else {
                preg_replace("#^\(Отредактировано администратором\)\.$#", "", $_POST['textarea']);
                $text = $this->clean($_POST['textarea']);

            }




            if ($task = $model->updateTask($name, $email, $text, $status, $id))
                $_SESSION['success'] = 'Задача успешно обновлена.';

            header("Location: index");
        }
        $this->set(compact('title', 'form'));
    }



}