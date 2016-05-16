<?php
/**
 * Created by PhpStorm.
 * User: vladimir
 * Date: 14.05.16
 * Time: 20:28
 */

namespace app\models;


class Genre_book extends \yii\db\ActiveRecord
{
    public static function getAllofGenre($book){
        $data = self::find()->where(['book_id'=>$book])->all();
        return $data;
    }
}