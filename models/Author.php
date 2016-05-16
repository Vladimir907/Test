<?php

namespace app\models;

class Author extends \yii\db\ActiveRecord
{
    public static function getAll()
    {
        $data = self::find()->all();
        return $data;
    }
    
    public static function getAuthors($author){
        $data = self::find()->where(['id_author'=>$author])->one();
        return $data->surname." ".$data->name;
    }
}