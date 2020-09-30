<div class="container">
    <h3>Редактировать задачу</h3>
    <form method="post" action="update">

        <div class="row">
            <input type="hidden" name="id" value="<?=$form[0]['id']?>" />
            <div class="form-group col-md-4">
                <label>Имя</label>
                <input type="text" class="form-control" placeholder="Имя" id="name" name="name" value="<?=$form[0]['name']?>">
            </div>
            <div class="form-group col-md-4">
                <label for="exampleFormControlInput1">Email</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="name@example.com" name="email" value="<?=$form[0]['email']?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="exampleFormControlTextarea">Текст задачи</label>
                <textarea class="form-control" id="textarea" rows="3"  name="textarea"><?=$form[0]['text']?></textarea>
            </div>
        </div>
        <div class="form-check col-md-4 mb-3">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="status" value="1" <?= $form[0]['status'] ? 'checked' : ''?>>
            <label class="form-check-label" for="exampleCheck1">Выполнено</label>
        </div>
        <button type="submit" class="btn btn-primary">Редактировать</button>
    </form>
</div>
