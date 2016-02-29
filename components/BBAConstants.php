<?php

namespace app\components;

use Yii;

/**
 * classe de constantes gloables pour biobankapps (BBA).
 */
class BBAConstants
{
    /**
     */
    const PATH_PHOTOS = "/web/photos/";

    public static function getPathPhotos() {
        return '/web/photos/';
    }

    public static function getPathImages() {
        return Yii::$app->request->baseUrl . '/images/';
    }

    //(3600*24*30)
    const DUREE_SESSION_USER = 2592000;
    /*
     * STATUT oui non
     */
    const OUI = 1;
    const NON = 0;
    /*
     * FORMAT DATE
     */
    const MYSQL_DATE_FORMAT = "Y-m-d H:i:s";
    const FRENCH_DATE_FORMAT = "H:i:s d/m/Y";
    const FRENCH_SHORT_DATE_FORMAT = "d/m/Y";
    const FRENCH_HD_DATE_FORMAT = "d/m/Y H:i";
    const HOUR_DATE_FORMAT = "H:i";

    public function getYesNoOption() {
        return array(
            BBAConstants::OUI => 'yes',
            BBAConstants::NON => 'no',
        );
    }

    public function getYesNo($stat) {
        $array = self::getYesNoOption();
        return $array[$stat];
    }

    /**
     * conversion des int de statut en string.
     * @return multitype:string
     */
    public function getStatusOption() {
        return array(
            BBAConstants::STATUT_ACTIF => 'Active',
            BBAConstants::STATUT_INACTIF => 'Inactive',
        );
    }

    /**
     * conversion du status
     * @param unknown $status
     * @return unknown
     */
    public function getStatus($status) {
        $array = self::getStatusOption();
        return $array[$status];
    }

    const DECIMAL_7_2_PATTERN = '/^[0-9]{1,5}(\.[0-9]{0,2})?$/';
}
?>