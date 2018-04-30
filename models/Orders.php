<?php

namespace app\models;

use Yii;

class Orders extends Model{

    public $id;
    public $date;
    public $quantity;
    public $totalAmount;
    public $product_id;
    public $user_id;

    public function rules()
    {
        return [
            [['date', 'quantity', 'totalAmount'], 'required'],
            [['date'], 'date'],
            [['quantity'], 'number'],
            [['totalAmount'], 'double']
        ];
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