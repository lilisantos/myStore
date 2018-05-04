<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Orders extends \yii\db\ActiveRecord{

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

    public function relations()
    {
        return array(
            'users' => array(self::BELONGS_TO, 'Users', 'user_id'),

            'products' => array(self::BELONGS_TO, 'Products', 'product_id'),
        );


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