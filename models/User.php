<?php

namespace app\models;
use Yii;

use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['username','password'], 'required']
        ];
    }

    public function relations()
    {
        return array(
            'orders' => array(self::HAS_MANY, 'Orders', 'user_id'),
        );

    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $user = self::find()
            ->where([
                "id" => $id
            ])
            ->one();
        if (!count($user)) {
            return null;
        }
        return new static($user);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = self::find()
            ->where(["accessToken" => $token])
            ->one();
        if (!count($user)) {
            return null;
        }
        return new static($user);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user = self::find()
            ->where([
                "username" => $username
            ])
            ->one();
        if (!count($user)) {
            return null;
        }
        return new static($user);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
