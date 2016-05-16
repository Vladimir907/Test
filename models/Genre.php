<?php
/**
 * Created by PhpStorm.
 * User: vladimir
 * Date: 13.05.16
 * Time: 20:11
 */

namespace app\models;

use yii\db\ActiveRecord;

class Genre extends ActiveRecord
{
    public static function getAll(){
        $data = self::find()->all();
        return $data;
    }

    public static function getGenre($id){
        $data = self::find()->where(['id_genre'=>$id])->one();
        return $data->title_genre;
    }
}