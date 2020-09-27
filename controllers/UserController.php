<?php
namespace controllers;

use vendor\Controller;

class UserController extends Controller
{
    public function loginAction()
    {
        /*if (!this->isGuest()) {
            return $this->goHome();
        }*/

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    private function isGuest()
    {

    }

    /**
     * Logout action.
     *
     */
    public function logoutAction()
    {
        $this->logout();

        return $this->goHome();
    }
}
