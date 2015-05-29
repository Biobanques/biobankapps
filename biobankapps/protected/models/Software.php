<?php

/**
 * This is the model class for table "logiciel".
 *
 * The followings are the available columns in table 'logiciel':
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
class Software extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Logiciel the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'logiciel';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nom, societe, url_societe, url_logiciel, licence,contact_login,contact_password', 'required'),
            array('prix, langue_fr, langue_en, langue_autres', 'numerical', 'integerOnly' => true),
            array('nom, societe, url_societe, url_logiciel, licence', 'length', 'max' => 200),
            array('descriptif_fr, descriptif_en', 'length', 'max' => 500),
            array('screenshot_1, screenshot_2, screenshot_3, screenshot_4, screenshot_5, logo', 'length', 'max' => 50),
            array('keywords_fr, keywords_en, contact_nom, contact_prenom, contact_login, contact_password', 'length', 'max' => 100),
            array('contact_email', 'length', 'max' => 128),
            array('contact_phone', 'length', 'max' => 20),
            //login unique
            array('contact_login', 'unique', 'message' => 'Cet identifiant de contact existe déjà.'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, nom, societe, url_societe, url_logiciel, licence, prix, descriptif_fr, descriptif_en, screenshot_1, screenshot_2, screenshot_3, screenshot_4, screenshot_5, logo_logiciel, keywords_fr, keywords_en, contact_nom, contact_prenom, contact_login, contact_password, contact_email, contact_phone, langue_fr, langue_en, langue_autres', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'nom' => Yii::t('common', 'nom'),
            'societe' => Yii::t('common', 'societe'),
            'url_societe' => Yii::t('common', 'url_societe'),
            'url_logiciel' => Yii::t('common', 'url_logiciel'),
            'licence' => Yii::t('common', 'licence'),
            'prix' => Yii::t('common', 'prix'),
            'descriptif_fr' => Yii::t('common', 'descriptif_fr'),
            'descriptif_en' => Yii::t('common', 'descriptif_en'),
            'screenshot_1' => 'Screenshot 1',
            'screenshot_2' => 'Screenshot 2',
            'screenshot_3' => 'Screenshot 3',
            'screenshot_4' => 'Screenshot 4',
            'screenshot_5' => 'Screenshot 5',
            'logo' => 'Logo',
            'keywords_fr' => Yii::t('common', 'keywords_fr'),
            'keywords_en' => Yii::t('common', 'keywords_en'),
            'contact_nom' => Yii::t('common', 'contact_nom'),
            'contact_prenom' => Yii::t('common', 'contact_prenom'),
            'contact_login' => 'Login',
            'contact_password' => 'Password',
            'contact_email' => 'Email',
            'contact_phone' => 'Phone',
            'langue_fr' => Yii::t('common', 'langue_fr'),
            'langue_en' => Yii::t('common', 'langue_en'),
            'langue_autres' => Yii::t('common', 'langue_autres'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * Order by random.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        $criteria = new CDbCriteria;
        //or condition between keywords fr and en ( keep this condition order)
        $criteria->compare('keywords_en', $this->keywords_en, true);
        //if keywords french are given into keyworkds fields
        $criteria->compare('keywords_fr', $this->keywords_en, true, 'OR');

        $criteria->compare('id', $this->id);
        $criteria->compare('nom', $this->nom, true);
        $criteria->compare('societe', $this->societe, true);
        $criteria->compare('licence', $this->licence, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * get the url of the logo picture
     */
    public function getLogoPicture() {
        $imgurl = Yii::app()->request->baseUrl . "/images/picture_empty.png";
        if ($this->logo != null) {
            $imgurl = Yii::app()->request->baseUrl . '/photos/' . $this->logo;
        }
        return $imgurl;
    }

}
