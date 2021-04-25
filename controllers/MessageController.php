<?php
namespace app\controllers;

use app\models\Message;
use yii\web\Controller;

class MessageController extends Controller
{
    public function actionShowMessage()
    {
        $messages = Message::find()->all();
        return $this->render('showMessage', compact('messages'));
    }
}