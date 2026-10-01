<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cars".
 *
 * @property int $id_cars
 * @property int $brands_id
 * @property string $model
 * @property int $car_class_id
 * @property int $year
 * @property string $number_car
 * @property string $color_car
 * @property float $day_price
 * @property int $is_free
 * @property string $description_car
 * @property string $image_car
 *
 * @property CarBrands $brands
 * @property CarClasses $carClass
 * @property RentalRequests[] $rentalRequests
 */
class Cars extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cars';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brands_id', 'model', 'car_class_id', 'year', 'number_car', 'color_car', 'day_price', 'is_free', 'description_car', 'image_car'], 'required'],
            [['brands_id', 'car_class_id', 'year', 'is_free'], 'integer'],
            [['day_price'], 'number'],
            [['model'], 'string', 'max' => 155],
            [['number_car', 'color_car'], 'string', 'max' => 50],
            [['description_car'], 'string', 'max' => 355],
            [['image_car'], 'string', 'max' => 255],
            [['brands_id'], 'exist', 'skipOnError' => true, 'targetClass' => CarBrands::class, 'targetAttribute' => ['brands_id' => 'id_car_brands']],
            [['car_class_id'], 'exist', 'skipOnError' => true, 'targetClass' => CarClasses::class, 'targetAttribute' => ['car_class_id' => 'id_car_classes']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cars' => 'Id Cars',
            'brands_id' => 'Brands ID',
            'model' => 'Model',
            'car_class_id' => 'Car Class ID',
            'year' => 'Year',
            'number_car' => 'Number Car',
            'color_car' => 'Color Car',
            'day_price' => 'Day Price',
            'is_free' => 'Is Free',
            'description_car' => 'Description Car',
            'image_car' => 'Image Car',
        ];
    }

    /**
     * Gets query for [[Brands]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrands()
    {
        return $this->hasOne(CarBrands::class, ['id_car_brands' => 'brands_id']);
    }

    /**
     * Gets query for [[CarClass]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarClass()
    {
        return $this->hasOne(CarClasses::class, ['id_car_classes' => 'car_class_id']);
    }

    /**
     * Gets query for [[RentalRequests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRentalRequests()
    {
        return $this->hasMany(RentalRequests::class, ['car_id' => 'id_cars']);
    }

}
