<?php

namespace frontend\modules\ads\models\entity;

class OptionsCar extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'cars_options';
    }

    public function  saveCarOptions($request, $car)
    {
        foreach ($request['Option']['name'] as  $value){
            $optionsCar = new OptionsCar();
            $a = function ($value){
                return $value;
            };

            $optionsCar->id_option = $a($value);
            $optionsCar->id_car = $car->id;
            $optionsCar->save();
        }
    }

}