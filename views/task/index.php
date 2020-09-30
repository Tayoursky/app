<?php
$arrow_up = '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"/>
                    </svg>';
$arrow_down = '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z"/>
                    </svg>';

?>
<div class="container">
    <h3>Менеджер задач</h3>
    <?php
        if (isset($_SESSION["success"]))
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>" . $_SESSION["success"]
                . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

        unset($_SESSION["success"]);
    ?>

    <p class="text-right">
        <a href="/task/create" class="btn btn-primary">Добавить задачу</a>
    </p>
    <div>

    <?php if (!empty($tasks)): ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">
                        <a href="index?sort=name&desc=<?=(($desc == 0 && $sort == 'name') ? 1: 0);?>&page=<?=$pagination->currentPage?>">
                            Имя<?= (($desc == 0 && $sort == 'name') ? $arrow_up : $arrow_down) ?>
                        </a>
                    </th>
                    <th scope="col">
                        <a href="index?sort=email&desc=<?=(($desc == 0 && $sort == 'email') ? 1: 0);?>&page=<?=$pagination->currentPage?>">
                            Email<?= (($desc == 0 && $sort == 'email') ? $arrow_up : $arrow_down) ?>
                        </a>
                    </th>
                    <th scope="col">Текст</th>
                    <th scope="col">
                        <a href="index?sort=status&desc=<?=(($desc == 0 && $sort == 'status') ? 1: 0);?>&page=<?=$pagination->currentPage?>">
                            Статус<?= (($desc == 0 && $sort == 'status') ? $arrow_up : $arrow_down) ?>
                        </a>
                    </th>
                    <?php if (isset($_SESSION['is_auth']) && $_SESSION['is_auth']) :?>
                        <th scope="col">Действие</th>
                    <?php endif;?>
                </tr>
            </thead>
            <tbody>

        <?php foreach ($tasks as $task): ?>

                <tr>
                    <th scope="row"><?= $task['id']?></th>
                    <td><?= $task['name']?></td>
                    <td><?= $task['email']?></td>
                    <td><?= $task['text']?></td>
                    <td><?= $task['status'] ? 'Выполнено' : 'Новая'; ?></td>
                    <?php if (isset($_SESSION['is_auth']) && $_SESSION['is_auth']) :?>
                    <td><a href="update?task=<?=$task['id']?>">Редактировать</a></td>
                    <?php endif;?>
                </tr>
        <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center">
            <p>Задачи: <?= count($tasks) ?> из <?= $total?></p>
            <?php if ($pagination->countPages > 1) :?>
                <?= $pagination ?>
            <?php endif;?>
        </div>

    <?php endif; ?>
    </div>
</div>


