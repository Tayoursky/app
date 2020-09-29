<div class="container">
    <h3>Создать задачу</h3>
    <form method="post" action="create">

        <div class="row">
            <div class="form-group col-md-4">
                <label>Имя</label>
                <input type="text" class="form-control" placeholder="Имя" id="name" name="name" required>
            </div>
            <div class="form-group col-md-4">
                <label for="exampleFormControlInput1">Email</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="name@example.com" name="email" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="exampleFormControlTextarea">Текст задачи</label>
                <textarea class="form-control" id="textarea" rows="3"  name="textarea" required></textarea>
            </div>
        </div>
        <div class="form-check col-md-4 mb-3">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="status" value="1">
            <label class="form-check-label" for="exampleCheck1">Выполнено</label>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
