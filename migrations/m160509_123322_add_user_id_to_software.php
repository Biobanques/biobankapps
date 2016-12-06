<?php

use yii\db\Migration;
use app\models\Software;
use app\models\User;

/**
 * Handles adding user_id to table `software`.
 */
class m160509_123322_add_user_id_to_software extends Migration {

    /**
     * @inheritdoc
     */
    public function up() {
     //   $this->addColumn('software', 'user_id', $this->integer());


        /**
         * todo migrate contact to users
         */
        /*
         * for each software add a user get the id and set the software
         */
        $softwares = Software::find()->all();
        foreach ($softwares as $software) {
            echo "migrating software:".$software->name."\n";
            $login = $software->contact_login;
            $pwd = $software->contact_password;
            $firstname = $software->contact_firstname;
            $name = $software->contact_name;
            $email = $software->contact_email;
            if(!isset($email)||$email==""|| $email=="NC")
                $email="contact@biobankapps.com";
            if(!isset($firstname)||$firstname=="")
                $firstname="biobankapps admin";
            if(!isset($name)||$name=="")
                $name="biobankapps admin";
            //create a user
            if (isset($login) && isset($pwd) && isset($firstname) && isset($name) && isset($email)) {
                $user = new User();
                $user->name = $name;
                $user->firstname = $firstname;
                $user->username = $login;
                $user->password = $pwd;
                
                $user->email = $email;
                $user->role=User::ROLE_SOFTWARE_PUBLISHER;
                if ($user->save(false)) {
                    $software->user_id = $user->id;
                    $software->save(false);
                }else{
                    //pb saving user
                    echo "pb saving user for software:".$software->name."\n";
                }
            }else{
                //pb getting contact infos
                echo "pb getting info  for software:".$software->name."\n";
            }
        }
        /**
         * drop old columns
         */
        $this->dropColumn('software', 'contact_firstname');
        $this->dropColumn('software', 'contact_name');
        $this->dropColumn('software', 'contact_login');
        $this->dropColumn('software', 'contact_password');
    }

    /**
     * @inheritdoc
     */
    public function down() {
        $this->dropColumn('software', 'user_id');
    }

}
