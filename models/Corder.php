<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "corder".
 *
 * @property int $id
 * @property int $customer_id
 * @property int $status
 *
 * @property Customer $customer
 * @property OrderItem[] $orderItems
 */
class Corder extends \yii\db\ActiveRecord
{
   const ACTIVE =1;
   const NOT_ACTIVE =2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'corder';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id'], 'required'],
            [['customer_id', 'status'], 'integer'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['order_id' => 'id']);
    }
}
