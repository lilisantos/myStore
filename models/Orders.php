<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Orders extends ActiveRecord{

    public $id;
    public $date;
    public $quantity;
    public $totalAmount;
    public $product_id;
    public $user_id;

    public function rules()
    {
        return [
            [['product_id', 'quantity'], 'required'],
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

    public function beforeSave($insert){
        if($insert){
            $this->date = date('Y-m-d', strtotime(Yii::$app->request->post('date')));

            return TRUE;
        }

        return false;
    }
}