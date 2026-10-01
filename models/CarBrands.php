<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car_brands".
 *
 * @property int $id_car_brands
 * @property string $name_car_brands
 *
 * @property Cars[] $cars
 */
class CarBrands extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_brands';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_car_brands'], 'required'],
            [['name_car_brands'], 'string', 'max' => 166],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_car_brands' => 'Id Car Brands',
            'name_car_brands' => 'Name Car Brands',
        ];
    }

    /**
     * Gets query for [[Cars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Cars::class, ['brands_id' => 'id_car_brands']);
    }

}
