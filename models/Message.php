<?php
namespace app\models;
use yii\base\Model;

class Message extends Model
{
    public $id;
    public $text;

    public function rules()
    {
        return [
            [['text'], 'required'],
        ];
    }
}