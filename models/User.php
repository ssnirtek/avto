<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id_user
 * @property string $fio
 * @property string $login
 * @property string $phone
 * @property string $email
 * @property int $category_id
 * @property string $password
 * @property int|null $is_admin
 * @property string $created_user
 *
 * @property Category $category
 * @property RentalRequests[] $rentalRequests
 */
class User extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_admin'], 'default', 'value' => null],
            [['fio', 'login', 'phone', 'email', 'category_id', 'password'], 'required'],
            [['category_id', 'is_admin'], 'integer'],
            [['created_user'], 'safe'],
            [['fio', 'login', 'password'], 'string', 'max' => 255],
            [['phone', 'email'], 'string', 'max' => 225],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id_category']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'fio' => 'Fio',
            'login' => 'Login',
            'phone' => 'Phone',
            'email' => 'Email',
            'category_id' => 'Category ID',
            'password' => 'Password',
            'is_admin' => 'Is Admin',
            'created_user' => 'Created User',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id_category' => 'category_id']);
    }

    /**
     * Gets query for [[RentalRequests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRentalRequests()
    {
        return $this->hasMany(RentalRequests::class, ['user_id' => 'id_user']);
    }

}
