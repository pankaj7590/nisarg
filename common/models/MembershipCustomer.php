<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "membership_customer".
 *
 * @property int $id
 * @property int $membership_id
 * @property int $customer_id
 * @property int $type
 * @property int $from_date
 * @property int $to_date
 * @property double $discount
 * @property double $charges
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Customer $customer
 * @property Membership $membership
 * @property User $createdBy
 * @property User $updatedBy
 */
class MembershipCustomer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'membership_customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['membership_id', 'customer_id', 'type', 'from_date', 'to_date', 'discount', 'charges'], 'required'],
            [['membership_id', 'customer_id', 'type', 'from_date', 'to_date', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['discount', 'charges'], 'number'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
            [['membership_id'], 'exist', 'skipOnError' => true, 'targetClass' => Membership::className(), 'targetAttribute' => ['membership_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'membership_id' => 'Membership ID',
            'customer_id' => 'Customer ID',
            'type' => 'Type',
            'from_date' => 'From Date',
            'to_date' => 'To Date',
            'discount' => 'Discount',
            'charges' => 'Charges',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
    public function getMembership()
    {
        return $this->hasOne(Membership::className(), ['id' => 'membership_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
