<?php

namespace humhub\modules\quicknotes\models;

use humhub\components\ActiveRecord;
use Yii;

class Note extends ActiveRecord
{

    public static function tablename()
    {
        return "quicknotes_note";
    }

    public function rules()
    {
        return [
            ['message', 'trim'],
            ['message', 'required'],
            ['message', 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'message' => Yii::t("QuicknotesModule.base", 'Note')
        ];
    }
}