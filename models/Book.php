<?php
/**
 * Created by PhpStorm.
 * User: vladimir
 * Date: 14.05.16
 * Time: 20:19
 */

namespace app\models;


class Book extends \yii\db\ActiveRecord
{
    public static function getAll(){
        $data = self::find()->all();
        return $data;
    }
}