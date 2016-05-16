<?php
/**
 * Created by PhpStorm.
 * User: vladimir
 * Date: 14.05.16
 * Time: 20:23
 */

namespace app\models;


class Author_book extends \yii\db\ActiveRecord
{
    public static function getAllofBook($id){
        $data = self::find()->where(['book_id'=>$id])->all();
        return $data;
    }
}