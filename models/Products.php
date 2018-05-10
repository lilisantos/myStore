<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $price
 */
class Products extends ActiveRecord
{
//    public $id;
//    public $name;
//    public $price;
//    public $description;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'price'], 'required'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 200],
        ];
    }

    public function relations()
    {
        return array(
            'orders' => array(self::HAS_MANY, 'Orders', 'product_id'),
        );

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'price' => 'Price',
        ];
    }
}
