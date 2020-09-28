
<div class="container">
    <h3>Менеджер задач</h3>
    <p class="text-right">
        <a href="/task/create" class="btn btn-primary">Добавить задачу</a>
    </p>
    <div>
    <?php if (!empty($tasks)): ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col"><a href="index?key=name">Имя</a></th>
                    <th scope="col"><a href="index?key=email">Email</a></th>
                    <th scope="col">Текст</th>
                    <th scope="col"><a href="index?key=status">Статус</a></th>
                    <th scope="col">Действие</th>
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
                    <td><a href="update?task=<?=$task['id']?>">Редактировать</a></td>
                </tr>
        <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center">
            <p>Задачи: <?=count($tasks)?> из <?= $total?></p>
            <?php if ($pagination->countPages > 1) :?>
                <?= $pagination ?>
            <?php endif;?>
        </div>

    <?php endif; ?>
    </div>
</div>


