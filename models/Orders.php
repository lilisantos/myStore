<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Orders extends ActiveRecord{

//    public $id;
//    public $date;
//    public $quantity;
//    public $totalAmount;
//    public $product_id;
//    public $user_id;

    public function rules()
    {
        return [
            [['product_id', 'quantity', 'date'], 'required'],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            [['quantity'], 'number'],
            [['total_amount'], 'double']
        ];
    }

    public function relations()
    {
        return array(
            'users' => array(self::BELONGS_TO, 'Users', 'user_id'),

            'products' => array(self::BELONGS_TO, 'Products', 'product_id'),
        );

    }

    public function getProducts()
    {
        return $this->belongsTo(Products::className(), ['product_id' => 'id']);
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }


}