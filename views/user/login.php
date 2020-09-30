
    <div class="container">
        <h3>Вход</h3>

        <?php
        if ($user->isAuth()) {
            echo "Здравствуйте, " . $user->getLogin() ;
        } else {
            if (isset($_SESSION['is_auth']) && !$_SESSION['is_auth'])
                echo "<div class='alert alert-danger' role='alert'>Не верный логин или пароль!</div>";
        ?>

            <div class="row">
                <div class="col-xs-8 col-md-6">

                    <form class="form-horizontal" role="form" method="post" id="loginForm" action="/user/login" data-toggle="validator">
                        <div class="form-group">
                            <label for="inputLogin" class="col-sm-2 control-label">Логин</label>
                            <div class="col-sm-10">
                                <input type="text" name="login" class="form-control" id="inputLogin" placeholder="Логин"
                                       value="<?php echo (isset($_POST["login"])) ? $_POST["login"] : null; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-2 control-label">Пароль</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Пароль" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Вход</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        <?php }?>
    </div>

