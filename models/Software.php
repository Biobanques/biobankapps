<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "logiciel".
 *
 * @property integer $id
 * @property string $nom
 * @property string $societe
 * @property string $url_societe
 * @property string $url_logiciel
 * @property string $licence
 * @property integer $prix
 * @property string $descriptif_fr
 * @property string $descriptif_en
 * @property string $screenshot_1
 * @property string $screenshot_2
 * @property string $screenshot_3
 * @property string $screenshot_4
 * @property string $screenshot_5
 * @property string $logo
 * @property string $keywords_fr
 * @property string $keywords_en
 * @property string $contact_nom
 * @property string $contact_prenom
 * @property string $contact_login
 * @property string $contact_password
 * @property string $contact_email
 * @property string $contact_phone
 * @property integer $langue_fr
 * @property integer $langue_en
 * @property integer $langue_autres
 */
class Software extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'logiciel';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['nom', 'societe', 'url_societe', 'url_logiciel', 'licence', 'contact_login', 'contact_password'], 'required'],
            [['prix', 'langue_fr', 'langue_en', 'langue_autres'], 'integer'],
            [['nom', 'societe', 'url_societe', 'url_logiciel', 'licence'], 'string', 'max' => 200],
            [['descriptif_fr', 'descriptif_en'], 'string', 'max' => 500],
            [['screenshot_1', 'screenshot_2', 'screenshot_3', 'screenshot_4', 'screenshot_5', 'logo'], 'string', 'max' => 50],
            [['keywords_fr', 'keywords_en', 'contact_nom', 'contact_prenom', 'contact_login', 'contact_password'], 'string', 'max' => 100],
            [['contact_email'], 'string', 'max' => 128],
            [['contact_phone'], 'string', 'max' => 20],
            [['contact_login'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'nom' => 'Nom',
            'societe' => 'Societe',
            'url_societe' => 'Url Societe',
            'url_logiciel' => 'Url Logiciel',
            'licence' => 'Licence',
            'prix' => 'Prix',
            'descriptif_fr' => 'Descriptif Fr',
            'descriptif_en' => 'Descriptif En',
            'screenshot_1' => 'Screenshot 1',
            'screenshot_2' => 'Screenshot 2',
            'screenshot_3' => 'Screenshot 3',
            'screenshot_4' => 'Screenshot 4',
            'screenshot_5' => 'Screenshot 5',
            'logo' => 'Logo',
            'keywords_fr' => 'Keywords Fr',
            'keywords_en' => 'Keywords En',
            'contact_nom' => 'Contact Nom',
            'contact_prenom' => 'Contact Prenom',
            'contact_login' => 'Contact Login',
            'contact_password' => 'Contact Password',
            'contact_email' => 'Contact Email',
            'contact_phone' => 'Contact Phone',
            'langue_fr' => 'Langue Fr',
            'langue_en' => 'Langue En',
            'langue_autres' => 'Langue Autres',
        ];
    }

    public function getLogoPicture($default = true) {
        if ($default)
            $imgurl = Yii::$app->request->baseUrl . "/images/picture_empty.png";
        else {
            $imgurl = null;
        }
        // $imgurl = "/web/images/picture_empty.png";
        if ($this->logo != null) {
            $imgurl = Yii::$app->request->baseUrl . '/photos/' . $this->logo;
        }
        return $imgurl;
    }

    public function getListPictures() {
        $listPictures = [];
        for ($i = 1; $i < 6; $i++) {
            $name = 'screenshot_' . $i;
            if ($this->$name != null) {
                $listPictures[] = \yii\helpers\Html::img(Yii::$app->request->baseUrl . '/photos/' . $this->$name);
            }
        }
        return $listPictures;
    }

    public function getListPicturesResized() {
        $listPictures = [];
        for ($i = 1; $i < 6; $i++) {
            $name = 'screenshot_' . $i;
            if ($this->$name != null) {
                $listPictures[$i] = \yii\helpers\Html::img(Yii::$app->request->baseUrl . '/photos/' . $this->$name, ['class' => 'img-thumbnail', 'style' => 'height:90px;width:160px']);
            }
        }
        return $listPictures;
    }

    public function getAuthKey() {

    }

    public function getId() {
        return $this->id;
    }

    public function validateAuthKey($authKey) {

    }

    public static function findIdentity($id) {
        return self::findOne($id);
    }

    public static function findByUsername($username) {
        return self::findOne(['contact_login' => $username]);
    }

    public static function findIdentityByAccessToken($token, $type = null) {

    }

    public function validatePassword($password) {
        if ($this->contact_password === $password)
            return true;
        return false;
    }

}