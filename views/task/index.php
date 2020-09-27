
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
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Email</th>
                    <th scope="col">Текст</th>
                    <th scope="col">Статус</th>
                </tr>
            </thead>
            <tbody>

        <?php foreach ($tasks as $task): ?>

                <tr>
                    <th scope="row"><?= $task['id']?></th>
                    <td><?= $task['name']?></td>
                    <td><?= $task['email']?></td>
                    <td><?= $task['text']?></td>
                    <td><?= $task['status']?></td>
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


