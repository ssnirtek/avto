<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car_classes".
 *
 * @property int $id_car_classes
 * @property string $name_car_classes
 * @property float $discount_car_classes
 *
 * @property Cars[] $cars
 */
class CarClasses extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_classes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_car_classes', 'discount_car_classes'], 'required'],
            [['discount_car_classes'], 'number'],
            [['name_car_classes'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_car_classes' => 'Id Car Classes',
            'name_car_classes' => 'Name Car Classes',
            'discount_car_classes' => 'Discount Car Classes',
        ];
    }

    /**
     * Gets query for [[Cars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Cars::class, ['car_class_id' => 'id_car_classes']);
    }

}
