<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const ROLE_SOFTWARE_PUBLISHER = 1;
    const ROLE_AUTHOR = 2;
    const ROLE_ADMIN = 3;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['username', 'password', 'email', 'name', 'firstname',], 'required'],
            [['username', 'password', 'email'], 'string', 'max' => 128],
            [['role'], 'integer'],
            [['id'], 'integer'],
            // the email attribute should be a valid email address
            ['email', 'email'],
            [['name', 'firstname', 'email'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'name' => 'Name',
            'firstname' => 'Firstname',
        ];
    }

    public function getAuthKey() {

    }

    public function validateAuthKey($authKey) {

    }

    public static function findIdentity($id) {
        return self::findOne($id);
    }

    public static function findByUsername($username) {
        return self::findOne(['username' => $username]);
    }

    public static function findIdentityByAccessToken($token, $type = null) {

    }

    public function validatePassword($password) {
        if ($this->password === $password)
            return true;
        return false;
    }

    public function getId() {
        return $this->id;
    }

    public function isAdmin() {
        return $this->role == self::ROLE_ADMIN ? true : false;
    }

    public $roleValues = array(self::ROLE_SOFTWARE_PUBLISHER => 'software editor', self::ROLE_AUTHOR => 'author evaluation', self::ROLE_ADMIN => 'administrator');
}