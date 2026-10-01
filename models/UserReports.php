<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_reports".
 *
 * @property int $id_user_reports
 * @property int $rental_request_id
 * @property string $description_reports
 * @property string $image_reports
 * @property string $notes_reports
 *
 * @property RentalRequests $rentalRequest
 */
class UserReports extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_reports';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rental_request_id', 'description_reports', 'image_reports', 'notes_reports'], 'required'],
            [['rental_request_id'], 'integer'],
            [['description_reports', 'image_reports', 'notes_reports'], 'string', 'max' => 255],
            [['rental_request_id'], 'exist', 'skipOnError' => true, 'targetClass' => RentalRequests::class, 'targetAttribute' => ['rental_request_id' => 'id_rental_requests']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user_reports' => 'Id User Reports',
            'rental_request_id' => 'Rental Request ID',
            'description_reports' => 'Description Reports',
            'image_reports' => 'Image Reports',
            'notes_reports' => 'Notes Reports',
        ];
    }

    /**
     * Gets query for [[RentalRequest]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRentalRequest()
    {
        return $this->hasOne(RentalRequests::class, ['id_rental_requests' => 'rental_request_id']);
    }

}
