<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rental_requests".
 *
 * @property int $id_rental_requests
 * @property int $user_id
 * @property int $car_id
 * @property string $start_date
 * @property int $day_count
 * @property float $day_price
 * @property float $discount
 * @property string $status
 * @property string|null $notes
 * @property string $created_requests
 *
 * @property Cars $car
 * @property User $user
 * @property UserReports[] $userReports
 */
class RentalRequests extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const STATUS_CREATED = 'created';
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_PROGRESS = 'progress';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rental_requests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['notes'], 'default', 'value' => null],
            [['user_id', 'car_id', 'start_date', 'day_count', 'day_price', 'discount', 'status'], 'required'],
            [['user_id', 'car_id', 'day_count'], 'integer'],
            [['start_date', 'created_requests'], 'safe'],
            [['day_price', 'discount'], 'number'],
            [['status'], 'string'],
            [['notes'], 'string', 'max' => 355],
            ['status', 'in', 'range' => array_keys(self::optsStatus())],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cars::class, 'targetAttribute' => ['car_id' => 'id_cars']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_rental_requests' => 'Id Rental Requests',
            'user_id' => 'User ID',
            'car_id' => 'Car ID',
            'start_date' => 'Start Date',
            'day_count' => 'Day Count',
            'day_price' => 'Day Price',
            'discount' => 'Discount',
            'status' => 'Status',
            'notes' => 'Notes',
            'created_requests' => 'Created Requests',
        ];
    }

    /**
     * Gets query for [[Car]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(Cars::class, ['id_cars' => 'car_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id_user' => 'user_id']);
    }

    /**
     * Gets query for [[UserReports]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserReports()
    {
        return $this->hasMany(UserReports::class, ['rental_request_id' => 'id_rental_requests']);
    }


    /**
     * column status ENUM value labels
     * @return string[]
     */
    public static function optsStatus()
    {
        return [
            self::STATUS_CREATED => 'created',
            self::STATUS_CONFIRMED => 'confirmed',
            self::STATUS_PROGRESS => 'progress',
            self::STATUS_COMPLETED => 'completed',
            self::STATUS_CANCELLED => 'cancelled',
        ];
    }

    /**
     * @return string
     */
    public function displayStatus()
    {
        return self::optsStatus()[$this->status];
    }

    /**
     * @return bool
     */
    public function isStatusCreated()
    {
        return $this->status === self::STATUS_CREATED;
    }

    public function setStatusToCreated()
    {
        $this->status = self::STATUS_CREATED;
    }

    /**
     * @return bool
     */
    public function isStatusConfirmed()
    {
        return $this->status === self::STATUS_CONFIRMED;
    }

    public function setStatusToConfirmed()
    {
        $this->status = self::STATUS_CONFIRMED;
    }

    /**
     * @return bool
     */
    public function isStatusProgress()
    {
        return $this->status === self::STATUS_PROGRESS;
    }

    public function setStatusToProgress()
    {
        $this->status = self::STATUS_PROGRESS;
    }

    /**
     * @return bool
     */
    public function isStatusCompleted()
    {
        return $this->status === self::STATUS_COMPLETED;
    }

    public function setStatusToCompleted()
    {
        $this->status = self::STATUS_COMPLETED;
    }

    /**
     * @return bool
     */
    public function isStatusCancelled()
    {
        return $this->status === self::STATUS_CANCELLED;
    }

    public function setStatusToCancelled()
    {
        $this->status = self::STATUS_CANCELLED;
    }
}
