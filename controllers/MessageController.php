<?php
namespace app\controllers;

use app\models\Message;
use yii\web\Controller;


use Yii;


class MessageController extends Controller
{

    public function actionCreateMessage()
    {
        $model = new Message();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $text = $model['text'];
            
            Yii::$app->db->createCommand()
            ->insert('message', [
                'text' => $text
            ])
            ->execute();

            $messages = Yii::$app->db->createCommand("SELECT * FROM message WHERE text='$text'")
            ->queryAll();
            
            return $this->render('show-message', ['model' => $model, 'messages' => $messages]);
        } else {
            
            return $this->render('create-message', ['model' => $model]);
        }
    }

    public function actionShowMessages()
    {

        $messages = Yii::$app->db->createCommand("SELECT * FROM message")
        ->queryAll();
        return $this->render('show-messages', ['messages' => $messages]);
    }
}